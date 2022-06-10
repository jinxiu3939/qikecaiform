<?php

namespace Qikecai\Sffrender\bean;

use ArrayAccess;
use Qikecai\Sffrender\util\StrHelper;

/**
 * 实体基础类
 */
abstract class BaseBean implements ArrayAccess
{
    public function __construct($data = [])
    {
        if ($data) {
            $this->setProperty($data);
        }
    }

    /**
     * 设置属性
     * @param $data mixed
     */
    final public function setProperty($data) {
        $arr_prop = $this->filterParam($data); // 过滤参数
        if ($arr_prop) {
            /* 过滤静态或非公共属性 */
            $class = new \ReflectionClass($this);
            foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
                if (!$property->isStatic() && array_key_exists($property->getName(), $arr_prop)) {
                    $property->setValue($this, $arr_prop[$property->getName()]); // 设置属性
                }
            }
        }
    }

    /**
     * 转换成数组
     * @param bool $snake 数组键是否转下划线
     * @param bool $filter 数组值是否过滤null
     * @return array
     */
    final public function toArray($snake = true, $filter = false) {
        $return = [];
        $class = new \ReflectionClass($this);
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (!$property->isStatic()) {
                if ($snake) {
                    $key = StrHelper::snake($property->getName()); // 驼峰属性转下划线变量
                } else {
                    $key = $property->getName();
                }
                $value = $property->getValue($this);
                if ($filter && $value === null) {
                    continue; // 过滤空值
                }
                $return[$key] = $this->formatValue($value); // 属性递归格式化
            }
        }
        return $return;
    }

    // ArrayAccess
    public function offsetSet($name, $value)
    {
        $this->setProperty([$name => $value]);
    }

    // ArrayAccess
    public function offsetExists($name): bool
    {
        return property_exists($this, $name) && !is_null($this->$name);
    }

    // ArrayAccess
    public function offsetUnset($name)
    {
        unset($this->$name);
    }

    // ArrayAccess
    public function offsetGet($name)
    {
        return $this->$name;
    }

    /**
     * 过滤参数
     * @param $data mixed
     * @return array|bool
     */
    private function filterParam($data) {
        if (is_array($data) && $data) {
            $arr_prop = $this->filterArray($data);
        } elseif ($data instanceof BaseBean) {
            $arr_prop = $this->filterArray($data->toArray());
        } else {
            $arr_prop = false;
        }
        return $arr_prop;
    }

    /**
     * @param $data array
     * @param $camel boolean 是否转换为驼峰
     * @return array
     */
    private function filterArray($data, $camel = true) {
        $arr_prop = [];
        foreach ($data as $key => $value) {
            if ($camel) {
                $prop = StrHelper::camel($key); // 下划线变量转驼峰属性
            } else {
                $prop = $key;
            }
            if (property_exists($this, $prop)) {
                $arr_prop[$prop] = $value;
            }
        }
        return $arr_prop;
    }

    /**
     * @param $value
     * @return array
     */
    private function formatValue($value) {
        if (is_array($value)) {
            $return = [];
            foreach ($value as $key => $item) {
                $return[$key] = $this->formatValue($item); // 递归
            }
        } else {
            $return = $value instanceof BaseBean ? $value->toArray() : $value; // 属性递归
        }
        return $return;
    }
}
