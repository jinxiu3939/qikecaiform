<?php

namespace Qikecai\Sffrender\data\editor;

/**
 * 富文本编辑器配置接口
 */
interface EditorConfigInterface
{
    /**
     * 获取编辑器配置
     * 
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $context 表单上下文
     */
    public function getEditorConfig(array $field, ?array $value, ?array $context);
}
