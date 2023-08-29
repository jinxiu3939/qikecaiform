<?php
/**
 * 时钟
 */

namespace Qikecai\Sffrender\driver\food\component\clock;

use Qikecai\Sffrender\driver\food\component\Component;

class Clock extends Component
{
    protected $attributeNames = [
        'kind', // 12 | 24
        'now', // 是否默认当前时间，boolean
        'readonly', // 是否只读，boolean
    ];
}
