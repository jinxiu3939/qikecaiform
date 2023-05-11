<?php
/**
 * 多选项组件
 */

namespace Qikecai\Sffrender\driver\food\component\checkbox;

use Qikecai\Sffrender\driver\food\component\radio\Radio;

class Checkbox extends Radio
{
    protected $attributeNames = [
        'clear', // 是否清除无效的值
        'readonly', // 是否只读
        'width', // 选项宽度
    ];

    protected $dataNames = [
        'options', // 选项
    ];
}
