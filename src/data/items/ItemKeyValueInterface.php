<?php
/**
 * 键值对项目接口
 */

namespace Qikecai\Sffrender\data\items;


interface ItemKeyValueInterface
{
    /**
     * 获取键值对配置
     * 
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $context 表单上下文
     * @return ItemKeyValueBean[]
     */
    public function getItemKeyValue(array $field, ?array $value, ?array $context): array;
}
