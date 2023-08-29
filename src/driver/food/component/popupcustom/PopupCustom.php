<?php
/**
 * 自定义对话框
 */

namespace Qikecai\Sffrender\driver\food\component\popupcustom;

use Qikecai\Sffrender\driver\food\component\Component;

class PopupCustom extends Component
{
    protected $attributeNames = [
        'readonly', // 是否只读
        'renderComponent', // 自定义对话框名称标识
        'size' // 尺寸
    ];

    protected $dataNames = [
        'text', // 显示文本
    ];
}
