<?php

namespace Qikecai\Sffrender\data\associate;

/**
 * 关联模型名称接口
 */
interface AssociateNameInterface
{
    /**
     * 获取关联模型的名称
     * 
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型所有字段值
     * @return string
     */
    public function getAssociateName(array $field, ?array $value, ?array $model): string;
}
