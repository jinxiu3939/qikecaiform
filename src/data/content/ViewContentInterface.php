<?php

namespace Qikecai\Sffrender\data\content;

/**
 * 详情内容接口
 */
interface ViewContentInterface
{
    /**
     * 获取详情内容
     *
     * @param mixed $value 字段值
     * @param array $field 字段配置
     * @param array $context 详情上下文
     * @return mixed
     */
    public function getBody(mixed $value, ?array $field, ?array $context);
}
