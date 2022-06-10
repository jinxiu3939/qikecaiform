<?php
/**
 * 密码框
 */

namespace Qikecai\Sffrender\driver\food\component\passwordbox;

use Qikecai\Sffrender\driver\food\component\Component;

class PasswordBox extends Component
{
    protected $attributeNames = [
        'empty', // 是否空置密码
        'visible', // 密码是否可见
    ];
}
