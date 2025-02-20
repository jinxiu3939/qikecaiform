<?php
namespace Qikecai\Sffrender\util;

class I18nHelper
{
    const FIELD_NAME_DELIMITER = '_i18n_'; // 字段命名分隔符

    /**
     * 字段命名
     * @param string $field_name
     * @param string $i18n
     * @return string
     */
    public static function nominateFieldName(string $field_name, string $i18n): string {
        return $field_name . self::FIELD_NAME_DELIMITER . $i18n; // 字段名添加语言后缀
    }

    /**
     * 获取表单值
     * @param array $data
     * @return array
     */
    public static function fetchFormValue(array $data): array {
        $return = [self::FIELD_NAME_DELIMITER => []];

        foreach ($data as $name => $input) {
            $delimiter_position = strpos($name, self::FIELD_NAME_DELIMITER); // 分割符号位置
            if ($delimiter_position > 0) {
                $i18n = substr($name, $delimiter_position + strlen(self::FIELD_NAME_DELIMITER)); // 获取多语言标识
                if (!isset($return[self::FIELD_NAME_DELIMITER][$i18n])) {
                    $return[self::FIELD_NAME_DELIMITER][$i18n] = ['i18n' => $i18n]; // 初始化多语言分组
                }
                $key = substr($name, 0, $delimiter_position);
                $return[self::FIELD_NAME_DELIMITER][$i18n][$key] = $input ?: ($data[$key] ?? ''); // 多语言值为空，取默认值
            } else {
                $return[$name] = $input;
            }
        }

        return $return;
    }
}
