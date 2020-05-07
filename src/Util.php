<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient;

use HarmSmits\BolComClient\Exception\InvalidArgumentException;
use HarmSmits\BolComClient\Objects\ObjectInterface;

class Util {

    /**
     * A table to convert java types to php types
     * @var string[]
     */
    private static array $types = [
        "boolean" => "bool",
        "string" => "string",
        "number" => "int",
        "integer" => "int",
        "array" => "array"
    ];

    /**
     * Map all items to a two dimensional array
     *
     * @param array $array
     *
     * @return array[]
     */
    public static function convertPureArray(array $array) {
        return array_map(function (ObjectInterface $item) {
            return $item->toArray();
        }, $array);
    }

    /**
     * Check if array is pure of type $type
     *
     * @param array  $array
     * @param string $type
     */
    public static function checkIfPureArray(array $array, string $type): void {
        array_walk($array, function ($item) use ($type) {
            if (!get_class($item) !== $type) {
                throw new InvalidArgumentException(sprintf("Unexpected class %s", get_class($item)));
            }
        });
    }

    /**
     * Check if an integer is in the correct range
     *
     * @param int $check
     * @param int $min
     * @param int $max
     *
     * @throws InvalidArgumentException
     */
    public static function checkIntegerBounds(int $check, int $min, int $max) {
        if ($check < $min || $check > $max)
            throw new InvalidArgumentException("Integer is not in correct range");
    }

    /**
     * Apply default value
     *
     * @param int|null $int
     * @param int      $default
     *
     * @return int
     */
    public static function checkIntegerDefault(?int $int, int $default) {
        return is_null($int) ? $default : $int;
    }

    /**
     * Check if an array is of the correct size
     *
     * @param array $array
     * @param int   $min
     * @param int   $max
     *
     * @throws InvalidArgumentException
     */
    public static function checkArrayBounds(array $array, int $min, int $max) {
        self::checkIntegerBounds(count($array), $min, $max);
    }

    /**
     * Check if an enum is valid
     *
     * @param string $enum
     * @param array  $enums
     */
    public static function checkEnumBounds(string $enum, array $enums) {
        if (!in_array($enum, $enums))
            throw new \InvalidArgumentException("Unknown enum");
    }

    /**
     * Verify integer format
     *
     * @param int    $integer
     * @param string $format
     */
    public static function checkIntegerFormat(int $integer, string $format) {

    }

    public static function javaTypeFixer(string $type) {
        return (isset(self::$types[$type]) ? self::$types[$type] : $type);
    }

    /**
     * Parse a path from the given specification
     *
     * @param string $path
     * @param array  $values
     *
     * @return string|string[]
     */
    public static function parsePath(string $path, array $values) {
        return str_replace($path, array_keys($values), array_values($values));
    }
}