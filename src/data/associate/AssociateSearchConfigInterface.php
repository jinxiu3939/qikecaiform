<?php
/**
 * 关联模型检索配置接口
 */

namespace Qikecai\Sffrender\data\associate;


interface AssociateSearchConfigInterface
{
    /**
     * 获取关联模型的检索配置
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型所有字段值
     * @return AssociateSearchConfigBean
     */
    public function getAssociateSearchConfig($field, $value, $model);
}
