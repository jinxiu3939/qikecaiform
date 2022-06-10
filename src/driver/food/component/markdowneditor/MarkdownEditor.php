<?php
/**
 * `markdown editor`富文本编辑器
 */

namespace Qikecai\Sffrender\driver\food\component\markdowneditor;

use Qikecai\Sffrender\driver\food\component\Component;

class MarkdownEditor extends Component
{
    protected $dataNames = [
        'editorConfig', // `markdown-editor`配置
    ];

    /**
     * 格式化表单组件
     * @param $component array 组件配置
     * @return array
     */
    protected function formatFormComponent($component)
    {
        $component = parent::formatFormComponent($component);
        /* editorConfig */
        $editor_config = isset($component['editorConfig']) ? $component['editorConfig'] : [];
        // 编辑器只读
        $editor_config['readOnly'] = isset($component['disabled']) ? $component['disabled'] : false;
        // 其他编辑器配置
        foreach ($editor_config as $key => $value) {
            if (isset($component[$key])) {
                $editor_config[$key] = $value;
                unset($component[$key]); // 清空多余配置
            }
        }
        $component['editorConfig'] = $editor_config;
        return $component;
    }
}
