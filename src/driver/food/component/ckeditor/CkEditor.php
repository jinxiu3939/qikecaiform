<?php
/**
 * `ckeditor`富文本编辑器
 */

namespace Qikecai\Sffrender\driver\food\component\ckeditor;

use Qikecai\Sffrender\driver\food\component\Component;

class CkEditor extends Component
{
    protected $attributeNames = [
        'editor', // 编辑器种类，['classic', 'balloon-block']
    ];

    protected $dataNames = [
        'editorConfig', // `ck-editor`配置
    ];
}
