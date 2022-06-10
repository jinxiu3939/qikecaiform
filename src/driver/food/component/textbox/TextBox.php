<?php
/**
 * 文本框
 */

namespace Qikecai\Sffrender\driver\food\component\textbox;


use Qikecai\Sffrender\driver\food\component\Component;

class TextBox extends Component
{
    protected $attributeNames = [
        'clear', // 是否清除不合法数据
        'kind', // 文本框类型
        'placeholder', // 提示
        'readonly', // 是否只读
    ];
}
