<?php
/**
 * 子项目属性接口
 */

namespace Qikecai\Sffrender\data\items;


interface ItemAttributeInterface
{
    /**
     * 获取子项目属性
     * 
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $context 表单上下文
     * @return ItemAttributeBean[]
     */
    public function getItemAttribute(array $field, ?array $value, ?array $context): array;
}
