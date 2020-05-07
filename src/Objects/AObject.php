<?php

namespace HarmSmits\BolComClient\Objects;

use HarmSmits\BolComClient\Exception\InvalidArgumentException ;
use HarmSmits\BolComClient\Exception\InvalidPropertyException;
use HarmSmits\BolComClient\Objects\ObjectInterface;

/**
 * Class AObject
 *
 * @package HarmSmits\BolComClient\Generated\Objects
 */
abstract class AObject implements ObjectInterface
{
    /**
     * Map all items to a two dimensional array
     *
     * @param array $array
     *
     * @return array[]
     */
    protected function _convertPureArray(array $array) {
        return array_map(function (ObjectInterface $item) {
            return $item->toArray();
        }, $array);
    }

    /**
     * Check if array is pure of type $type
     *
     * @param array  $array
     * @param string $type
     *
     * @throws InvalidArgumentException
     */
    protected function _checkIfPureArray(array $array, string $type): void {
        array_walk($array, function ($item) use ($type) {
            if (!get_class($item) !== $type) {
                // throw new InvalidArgumentException(sprintf("Unexpected class %s", get_class($item)));
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
    protected function _checkIntegerBounds(int $check, int $min, int $max) {
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
    protected function _checkIntegerDefault(?int $int, int $default) {
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
    protected function _checkArrayBounds(array $array, int $min, int $max) {
        $this->_checkIntegerBounds(count($array), $min, $max);
    }

    /**
     * Check if an enum is valid
     *
     * @param string $enum
     * @param array  $enums
     */
    protected function _checkEnumBounds(string $enum, array $enums) {
        if (!in_array($enum, $enums))
            throw new \InvalidArgumentException("Unknown enum");
    }

    /**
     * Verify integer format
     *
     * @param int    $integer
     * @param string $format
     */
    protected function _checkIntegerFormat(int $integer, string $format) {

    }
}