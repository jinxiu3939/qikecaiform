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
     * @param array $value 字段值
     * @param array $model 模型所有字段值
     * @return AssociateSearchConfigBean
     */
    public function getAssociateSearchConfig(array $field, ?array $value, ?array $model): AssociateSearchConfigBean;
}
