<?php

namespace Qikecai\Sffrender\data\content;

/**
 * 关联内容接口
 */
interface AssociateContentInterface
{
    /**
     * 获取关联显示内容
     * 
     * @param mixed $value 字段值
     * @param array $field 字段配置
     * @param array $context 上下文
     * @return mixed
     */
    public function getText(mixed $value, ?array $field, ?array $context);
}
