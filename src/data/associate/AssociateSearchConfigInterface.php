<?php

namespace Qikecai\Sffrender\data\associate;

/**
 * 关联模型检索配置接口
 */
interface AssociateSearchConfigInterface
{
    /**
     * 获取关联模型的检索配置
     *
     * @param array $field 字段配置
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return AssociateSearchConfigBean
     */
    public function getAssociateSearchConfig(array $field, mixed $value, ?array $context): AssociateSearchConfigBean;
}
