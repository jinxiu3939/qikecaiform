<?php

namespace Qikecai\Sffrender\util;

use Qikecai\Sffrender\data\items\ItemKeyValueBean;

class StrHelper
{
    protected static $snakeCache = [];

    protected static $camelCache = [];

    protected static $studlyCache = [];

    /**
     * 字符串转小写
     *
     * @param  string $value
     * @return string
     */
    public static function lower(string $value): string
    {
        return mb_strtolower($value, 'UTF-8');
    }

    /**
     * 字符串转大写
     *
     * @param  string $value
     * @return string
     */
    public static function upper(string $value): string
    {
        return mb_strtoupper($value, 'UTF-8');
    }

    /**
     * 驼峰转下划线
     *
     * @param  string $value
     * @param  string $delimiter
     * @return string
     */
    public static function snake(string $value, string $delimiter = '_'): string
    {
        $key = $value;

        if (isset(static::$snakeCache[$key][$delimiter])) {
            return static::$snakeCache[$key][$delimiter];
        }

        if (!ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = static::lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
        }

        return static::$snakeCache[$key][$delimiter] = $value;
    }

    /**
     * 下划线转驼峰(首字母小写)
     *
     * @param  string $value
     * @return string
     */
    public static function camel(string $value): string
    {
        if (isset(static::$camelCache[$value])) {
            return static::$camelCache[$value];
        }

        return static::$camelCache[$value] = lcfirst(static::studly($value));
    }

    /**
     * 下划线转驼峰(首字母大写)
     *
     * @param  string $value
     * @return string
     */
    public static function studly(string $value): string
    {
        $key = $value;

        if (isset(static::$studlyCache[$key])) {
            return static::$studlyCache[$key];
        }

        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return static::$studlyCache[$key] = str_replace(' ', '', $value);
    }

    /**
     * 格式化配置项键值对
     * 
     * @param array $setting 配置项
     * @return array
     */
    public static function formatSettingItem(array $setting): array {
        $return = [];
        foreach ($setting as $key => $payload) {
            if ($payload === 'boolean') {
                $return[] = new ItemKeyValueBean(['key' => $key, 'type' => 'boolean-radio']);
            } elseif (is_array($payload)) {
                $return[] = new ItemKeyValueBean(['key' => $key, 'type' => 'drop-down', 'options' => $payload]);
            } elseif ($payload === 'number') {
                $return[] = new ItemKeyValueBean(['key' => $key, 'type' => 'number']);
            } elseif ($payload === 'textarea') {
                $return[] = new ItemKeyValueBean(['key' => $key, 'type' => 'textarea']);
            } else {
                $return[] = new ItemKeyValueBean(['key' => $key, 'type' => 'input']);
            }
        }
        return $return;
    }
}
