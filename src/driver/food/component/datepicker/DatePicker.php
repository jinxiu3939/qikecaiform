<?php
/**
 * 日期时间选择器
 */

namespace Qikecai\Sffrender\driver\food\component\datepicker;

use Qikecai\Sffrender\driver\food\component\Component;

class DatePicker extends Component
{
    protected $attributeNames = [
        'clear', // 是否清空不合法日期，boolean
        'format', // 日期格式
        'kind', // 时间类型，'date' | 'date-time'
        'now', // 是否默认当前时间，boolean
        'readonly', // 是否只读，boolean
    ];
}
