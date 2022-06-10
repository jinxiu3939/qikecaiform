<?php
/**
 * 关联模型名称接口
 */

namespace Qikecai\Sffrender\data\associate;


interface AssociateNameInterface
{
    /**
     * 获取关联模型的名称
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型所有字段值
     * @return string
     */
    public function getAssociateName($field, $value, $model);
}
