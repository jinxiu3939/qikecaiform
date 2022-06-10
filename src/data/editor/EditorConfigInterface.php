<?php
/**
 * 富文本编辑器配置接口
 */

namespace Qikecai\Sffrender\data\editor;


interface EditorConfigInterface
{
    /**
     * 获取编辑器配置
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型所有字段值
     */
    public function getEditorConfig($field, $value, $model);
}
