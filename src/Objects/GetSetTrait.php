<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Objects;

use HarmSmits\BolComClient\Exception\InvalidPropertyException;

/**
 * Trait GetSetTrait
 * @package HarmSmits\BolComClient\Objects
 */
trait GetSetTrait
{
    /**
     * Will link magic set and get methods to class properties.
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     *
     * @throws InvalidPropertyException
     */
    public function __call($name, $arguments)
    {
        $mode = substr($name, 0, 3);
        $name = lcfirst(substr($name, 3));
        if ($mode == 'get' && !!property_exists($this, $name)) {
            return ($this->{$name});
        } else if ($mode == 'set' && !!property_exists($this, $name)) {
            $this->{$name} = $arguments[array_key_first($arguments)];
        } else {
            throw new InvalidPropertyException();
        }
        return (NULL);
    }

    private function _convertPureArray(array $array) {
        return array_map(function (ObjectInterface $item) {
            return $item->toArray();
        }, $array);
    }
}