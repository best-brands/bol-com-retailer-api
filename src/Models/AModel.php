<?php

namespace HarmSmits\BolComClient\Models;

use BadMethodCallException;
use DateTime;
use InvalidArgumentException;

/**
 * Class AModel
 * @package BestBrands\KiyohClient\Models
 */
class AModel
{
    /**
     * Handle the calling of functions
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        $get = $this->_startsWith($method, 'get');
        $set = $this->_startsWith($method, 'set');

        if ($get || $set) {
            $variable = lcfirst(substr($method, 3));
            if (!$this->_propertyExists($variable)) {
                die(sprintf("Invalid variable name `%s` - using `%s`", $variable, $method));
            }

            if (count($args) !== (int)$set) {
                throw new BadMethodCallException("Invalid parameters");
            } else if ($set) {
                $this->{$variable} = reset($args);
                return $this;
            } else {
                return $this->{$variable};
            }
        }

        throw new BadMethodCallException();
    }

    /**
     * Check whether a property exists, if not, throw an error
     *
     * @param string $property
     *
     * @return bool
     */
    protected function _propertyExists(string $property): bool
    {
        return property_exists($this, $property);
    }

    /**
     * Check whether the string starts with another string
     *
     * @param string $target
     * @param string $starts_with
     *
     * @return bool
     */
    protected function _startsWith(string $target, string $starts_with): bool
    {
        return (substr($target, 0, strlen($starts_with)) === $starts_with);
    }

    /**
     * Parse the date
     *
     * @param $updatedSince
     *
     * @return DateTime
     */
    protected function _parseDate($updatedSince): DateTime
    {
        $result = new DateTime();

        if ($updatedSince instanceof DateTime) {
            $result = $updatedSince;
        } else if (gettype($updatedSince) === 'int') {
            ($result = new DateTime())->setTimestamp($updatedSince);
        } else if ($parsed = DateTime::createFromFormat(DATE_ISO8601, $updatedSince)) {
            $result = $parsed;
        }

        return $result;
    }

    /**
     * Check if array is pure of type $type
     *
     * @param array  $array
     * @param string $type
     *
     * @throws InvalidArgumentException
     */
    protected function _checkIfPureArray(array $array, string $type): void
    {
        array_walk($array, function ($item) use ($type) {
            if (!is_a($item, $type)) {
                throw new InvalidArgumentException(sprintf("Unexpected class %s", get_class($item)));
            }
        });
    }

    /**
     * Export the current object to an array
     *
     * @param bool $convert_dates
     *
     * @return array
     */
    public function __toArray($convert_dates = true): array
    {
        $result = [];

        foreach (get_object_vars($this) as $var => $value) {
            try {
                $value = $this->{'get' . ucfirst($var)}();

                if (is_array($value)) {
                    $result[$var] = array_map(fn(AModel $model) => $model->__toArray($convert_dates), $value);
                } elseif ($value instanceof AModel) {
                    $result[$var] = $value->__toArray($convert_dates);
                } elseif ($value instanceof DateTime && $convert_dates) {
                    $result[$var] = $value->format(DATE_ISO8601);
                } else {
                    $result[$var] = $value;
                }
            } catch (BadMethodCallException $e) {
            }
        }

        return $result;
    }

    /**
     * Map all items to a two dimensional array
     *
     * @param array $array
     *
     * @return array[]
     */
    protected function _convertPureArray(array $array)
    {
        return array_map(function (AModel $item) {
            return $item->toArray();
        }, $array);
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
    protected function _checkIntegerBounds(int $check, int $min, int $max)
    {
        if ($check < $min || $check > $max) {
            throw new InvalidArgumentException("Integer is not in correct range");
        }
    }

    /**
     * Check if a float is in the correct range
     *
     * @param float $check
     * @param float $min
     * @param float $max
     *
     * @throws \HarmSmits\BolComClient\Exception\InvalidArgumentException
     */
    protected function _checkFloatBounds(float $check, float $min, float $max)
    {
        if ($check < $min || $check > $max) {
            throw new InvalidArgumentException("Float is not in correct range");
        }
    }

    /**
     * Apply default value
     *
     * @param int|null $int
     * @param int      $default
     *
     * @return int
     */
    protected function _checkIntegerDefault(?int $int, int $default)
    {
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
    protected function _checkArrayBounds(array $array, int $min, int $max)
    {
        $this->_checkIntegerBounds(count($array), $min, $max);
    }

    /**
     * Check if an enum is valid
     *
     * @param string $enum
     * @param array  $enums
     */
    protected function _checkEnumBounds(string $enum, array $enums)
    {
        if (!in_array($enum, $enums)) {
            throw new InvalidArgumentException("Unknown enum");
        }
    }
}