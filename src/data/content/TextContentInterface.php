<?php

namespace Qikecai\Sffrender\data\content;

/**
 * 文本内容接口
 */
interface TextContentInterface
{
    /**
     * 获取文本显示内容
     *
     * @param mixed $value 字段值
     * @param array $field 字段配置
     * @param array $context 上下文
     * @return string
     */
    public function getText(mixed $value, ?array $field, ?array $context);
}
