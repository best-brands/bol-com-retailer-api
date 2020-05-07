<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient;

/**
 * Class Populator
 * @package HarmSmits\BolComClient
 */
class Populator
{
    const TYPE_ARRAY_OF_OBJECTS = "OBJ_ARRAY";
    const TYPE_OBJECT = "OBJ";

    /**
     * Populate the specification with the retrieved data
     * @param array $spec
     * @param array $rawData
     * @return mixed
     */
    public function populate(array $spec, array $rawData)
    {
        $object = $spec['$type'];
        $class = $spec['$ref'];

        foreach ($spec as $_spec => $value) {
            if ($_spec == '$type' || $_spec == '$ref')
                continue ;
            if (array_key_exists($_spec, $rawData))
                $rawData[$_spec] = $this->populate($spec[$_spec], $rawData[$_spec]);
        }

        if ($object == self::TYPE_ARRAY_OF_OBJECTS) {
            return ($this->populateArrayOfObjects($spec, $rawData, $class));
        } else {
            return ($this->populateObject($spec, $rawData, $class));
        }
    }

    /**
     * Populate an array of objects according to the specification.
     * @param        $spec
     * @param array  $rawData
     * @param string $class
     * @return array
     */
    private function populateArrayOfObjects($spec, array $rawData, string $class): array
    {
        $data = [];
        foreach ($rawData as $rawDataItem) {
            $data[] = $this->populateObject($spec, $rawDataItem, $class);
        }
        return ($data);
    }

    /**
     * Map a single object to its properties
     * @param        $spec
     * @param array  $rawData
     * @param string $class
     * @return mixed
     */
    public function populateObject($spec, array $rawData, string $class)
    {
        $instance = new $class;
        foreach ($rawData as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($instance, $method))
                $instance->{$method}($value);
        }
        return ($instance);
    }
}