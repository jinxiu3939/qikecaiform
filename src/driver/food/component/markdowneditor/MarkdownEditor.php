<?php
/**
 * `markdown editor`富文本编辑器
 */

namespace Qikecai\Sffrender\driver\food\component\markdowneditor;

use Qikecai\Sffrender\driver\food\component\Component;

class MarkdownEditor extends Component
{
    protected $attributeNames = [
        'readonly', // 是否只读，boolean
        'height', // 高度
    ];

    protected $dataNames = [
        'editorConfig', // `markdown-editor`配置
    ];
}
