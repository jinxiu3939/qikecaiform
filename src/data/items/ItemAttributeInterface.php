<?php
/**
 * 子项目属性接口
 */

namespace Qikecai\Sffrender\data\items;


interface ItemAttributeInterface
{
    /**
     * 获取子项目属性
     * @param array $field
     * @param array $value
     * @param array $model
     * @return ItemAttributeBean[]
     */
    public function getItemAttribute($field, $value, $model);
}
