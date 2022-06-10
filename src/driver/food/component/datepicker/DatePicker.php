<?php
/**
 * 日期时间选择器
 */

namespace Qikecai\Sffrender\driver\food\component\datepicker;

use Qikecai\Sffrender\bean\ComponentViewBean;
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

    /**
     * 格式化预览内容
     * @param ComponentViewBean $bean
     * @return mixed
     */
    protected function formatViewContent(ComponentViewBean $bean) {
        if ($bean->value) {
            $field_config = $this->parseFieldConfig(); // 获取字段配置
            if (isset($field_config['format']) && $field_config['format']) {
                $bean->value = date($field_config['format'], strtotime($bean->value));
            } elseif (isset($field_config['kind']) && $field_config['kind']) {
                if ($field_config['kind'] == 'date') {
                    $bean->value = date('Y-m-d', strtotime($bean->value));
                }
            }
        }
        return $bean->toArray(false);
    }
}
