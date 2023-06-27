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
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return string|array
     */
    public function getAssociateName(array $field, mixed $value, ?array $context);
}
