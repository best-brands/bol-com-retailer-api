<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

use HarmSmits\BolComClient\Populator;
use HarmSmits\BolComClient\Util;

class GenerateMap
{
    /** @var array */
    protected array $spec;

    /** @var string */
    protected string $protocol;

    /** @var string */
    protected string $host;

    /** @var string[] */
    protected array $includes;

    /**
     * Load the json specification
     *
     * @param $path
     */
    public function __construct(string $path)
    {
        $this->spec = json_decode(file_get_contents($path), true);
        $this->protocol = array_pop($this->spec["schemes"]);
        $this->host = $this->spec["host"];
    }

    /**
     * Convert dash case to camel case
     *
     * @param $string
     *
     * @return string|string[]
     */
    private function dashesToCamelCase($string): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * Generate the method name
     *
     * @param array $parts
     *
     * @return string|string[]
     */
    private function getMethodName(array $parts): string
    {
        $makeNonPlural = false;

        $parts = array_map(function ($part) {
            if ($part === "retailer") return "";
            if (strpos($part, "{") !== false) return "by-" . trim($part, "{}");
            return $part;
        }, $parts);

        $part = $this->dashesToCamelCase(implode("-", $parts));
        return ($makeNonPlural ? rtrim($part, "s") : $part);
    }

    /**
     * Get the parameter name
     *
     * @param array $spec
     *
     * @return string
     */
    private function getParameterName(array $spec)
    {
        if (isset($spec["name"])) {
            return lcfirst($this->dashesToCamelCase($spec["name"]));
        } else if (isset($spec["schema"])) {
            $list = explode("/", $spec["schema"]["\$ref"]);
            return $list[array_key_last($list)];
        } else {
            return "unknown";
        }
    }

    /**
     * Get the parameter type
     *
     * @param array $spec
     *
     * @return mixed|string|null
     */
    private function getParameterType(array $spec)
    {
        if (isset($spec["type"])) {
            return Util::javaTypeFixer($spec["type"]);
        } else if (isset($spec["schema"])) {
            $object = $this->getObjectName($spec["schema"]["\$ref"]);
            $this->addInclude($object);
            return Util::javaTypeFixer($this->getObjectName($object));
        } else {
            return null;
        }
    }

    /**
     * Add a parameter to the method based on its schema
     *
     * @param \Nette\PhpGenerator\Method $method
     * @param array                      $schema
     */
    private function addParameter(\Nette\PhpGenerator\Method $method, array $schema)
    {
        $name = $this->getParameterName($schema);
        $type = $this->getParameterType($schema);

        $param = $method->addParameter($name);
        $param->setType($type);

        $comment = "@param $type $$name";
        if (isset($schema["description"]))
            $comment .= " " . $schema["description"];

        $method->addComment(wordwrap($comment, 80));

        if (!$schema["required"]) {
            $param->setNullable(!$schema["required"]);
            $param->setDefaultValue(null);
        }
    }

    /**
     * Sort the parameter array
     *
     * @param array $parameters
     */
    private function sortParameters(array &$parameters)
    {
        usort($parameters, function ($left, $right) {
            if ($left === $right) {
                return 0;
            } else if ($left === false) {
                return 1;
            } else {
                return -1;
            }
        });
    }

    private function getObjectName(string $reference)
    {
        $parts = explode("/", $reference);
        return $parts[array_key_last($parts)];
    }

    private function getSchemaProperties(string $reference)
    {
        $spec = $this->spec;
        $parts = explode("/", $reference);
        $parts[] = "properties";

        for ($i = 1; $i < count($parts); $i++) {
            $spec = $spec[$parts[$i]];
        }

        return $spec;
    }

    /**
     * Get a full schema by reference
     *
     * @param string $reference
     *
     * @return array
     */
    private function getFullSchema(string $reference)
    {
        return array_map(function ($property) {
            $is_array = isset($property["items"]);
            $reference = $is_array ? $property["items"]["\$ref"] : $property["\$ref"];

            return array_merge([
                "\$type" => $is_array ? Populator::TYPE_ARRAY_OF_OBJECTS : Populator::TYPE_OBJECT,
                "\$ref" => sprintf('HarmSmits\BolComClient\Models\%s', $this->getObjectName($reference))
            ], $this->getFullSchema($reference));

        }, array_filter($this->getSchemaProperties($reference), function ($item) {
            return ((isset($item["items"]) && isset($item["items"]["\$ref"])) || isset($item["\$ref"]));
        }));
    }

    /**
     * Get a full schema by reference
     *
     * @param string $reference
     *
     * @return array
     */
    private function getFullSchemaByReference(string $reference) {
        return array_merge(
            [
                "\$type" => Populator::TYPE_OBJECT,
                "\$ref" => sprintf('HarmSmits\BolComClient\Models\%s', $this->getObjectName($reference))
            ],
            $this->getFullSchema($reference)
        );
    }

    /**
     * Generate the response body
     *
     * @param array $responses
     *
     * @return string
     */
    private function generateResponseBody(array $responses): string
    {
        $formatted = [];

        foreach ($responses as $code => $response) {
            if (isset($response["schema"]) && isset($response["schema"]["\$ref"]))
                $formatted[intval($code)] = $this->getFullSchemaByReference($response["schema"]["\$ref"]);
        }

        return var_export($formatted, true);
    }

    private function generateHeaders(array $spec) {
        $headers = [];

        if (isset($spec["produces"]))
            $headers["Accept"] = $spec["produces"][0];

        if (isset($spec["consumes"]))
            $headers["Content-Type"] = $spec["consumes"][0];
        return (var_export($headers, true));
    }

    /**
     * Generate the method body
     *
     * @param \Nette\PhpGenerator\Method $method
     * @param string                     $path
     * @param string                     $rest
     * @param array                      $spec
     */
    private function generateMethodBody(\Nette\PhpGenerator\Method &$method, string $path, string $rest, array $spec)
    {
        $sorted = [];

        if (isset($spec["parameters"])) {
            foreach ($spec["parameters"] as $parameter) {
                if (!isset($sorted[$parameter["in"]]))
                    $sorted[$parameter["in"]] = [];

                $sorted[$parameter["in"]][] = $parameter;
            }
        }

        $method->addBody('$data = [];');
        $method->addBody(sprintf('$url = "https://api.bol.com%s";', $path));
        $method->addBody(sprintf('$method = "%s";', $rest));

        if (isset($sorted["path"])) {
            foreach ($sorted["path"] as $path) {
                $method->addBody(sprintf(
                        '$url = str_replace(%s, $%s, $url);',
                        '"{' . $path["name"] . '}"',
                        $this->getParameterName($path))
                );
            }
        }

        if (isset($sorted["query"])) {
            $method->addBody('$data["query"] = [];');
            foreach ($sorted["query"] as $query) {
                $method->addBody(sprintf('$data["query"]["%s"] = $%s;', $query["name"], $this->getParameterName($query)));
            }
        }

        if (isset($sorted["body"])) {
            $method->addComment(sprintf("\n@throws \%s", HarmSmits\BolComClient\Exception\InvalidPropertyException::class));

            foreach ($sorted["body"] as $body) {
                $method->addBody(sprintf('$data["body"] = $%s->toArray();', $this->getParameterName($body)));
            }
        }

        $method->addBody(sprintf('$data["headers"] = %s;', $this->generateHeaders($spec)));
        $method->addBody(sprintf('$response = %s;', $this->generateResponseBody($spec["responses"])));
        $method->addBody('$data = array_map("array_filter", $data);');
        $method->addBody('return [$method, $url, $data, $response];');
    }

    /**
     * Add a method to a class with a name and a given specification
     *
     * @param \Nette\PhpGenerator\ClassType $class
     * @param string                        $name
     * @param array                         $spec
     * @param string                        $path
     * @param string                        $rest
     */
    private function addMethod(\Nette\PhpGenerator\ClassType &$class, string $name, array $spec, string $path, string $rest)
    {
        $method = $class->addMethod($name);
        $method->setReturnType("array");

        if (isset($spec["description"]))
            $method->addComment(wordwrap($spec["description"], 80) . "\n");

        if (isset($spec["parameters"])) {
            $this->sortParameters($spec["parameters"]);

            foreach ($spec["parameters"] as $parameter) {
                $this->addParameter($method, $parameter);
            }
        }

        $method->addComment("@return array");
        $this->generateMethodBody($method, $path, $rest, $spec);
    }

    /**
     * Set the path methods
     *
     * @param \Nette\PhpGenerator\ClassType $class
     *
     * @return void
     */
    private function setPathMethods(\Nette\PhpGenerator\ClassType &$class)
    {
        foreach ($this->spec["paths"] as $path => $schema) {
            foreach ($schema as $method => $spec) {
                $parts = explode("/", $path);
                $name = $method . $this->getMethodName($parts);
                $this->addMethod($class, $name, $spec, $path, $method);
            }
        }
    }

    private function addInclude(string $name) {
        $this->includes[] = "use HarmSmits\BolComClient\Models\\$name;";
    }

    /**
     * Get the paths
     *
     * @return string
     */
    public function generate(): string
    {
        $class = new \Nette\PhpGenerator\ClassType();
        $class->setName("Request");
        $this->setPathMethods($class);

        return implode("\n", $this->includes) . "\n\n" . (string)$class;
    }
}

require(dirname(__DIR__) . "/vendor/autoload.php");

$class = new GenerateMap(dirname(__DIR__) . "/resources/v3.json");
$text = $class->generate();

file_put_contents(dirname(__DIR__) . "/src/Request.php", <<<PHP
<?php

namespace HarmSmits\BolComClient;

$text
PHP
);
