<?php
/**
 * 日期时间选择器
 */

namespace Qikecai\Sffrender\driver\food\component\datepicker;

use Qikecai\Sffrender\bean\ComponentViewBean;
use Qikecai\Sffrender\ComponentInterface;
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

    /* 预览文本格式 */
    const VIEW_TEXT_FORMAT_AGE = 'age'; // 年龄
    const VIEW_TEXT_FORMAT_HUMANIZE = 'humanize'; // 人性化时间显示

    /**
     * 格式化预览内容
     * @param ComponentViewBean $bean
     * @return mixed
     */
    protected function formatViewContent(ComponentViewBean $bean) {
        /* 字段值格式化 */
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

        /* 显示值格式化 */
        $format = isset($this->field['config'][ComponentInterface::VIEW_FORMAT_NAME])
            ? $this->field['config'][ComponentInterface::VIEW_FORMAT_NAME] : false;
        if ($format && $bean->text) {
            if ($format === self::VIEW_TEXT_FORMAT_AGE) { // 年月日转换成年龄
                $bean->text = $this->formatToAge($bean->text);
            } elseif ($format === self::VIEW_TEXT_FORMAT_HUMANIZE) { // 转换成人性化时间
                $bean->text = $this->formatToHumanizeText($bean->text);
            }
        }

        return $bean->toArray(false);
    }

    private function formatToAge($date) {
        if ($date) {
            $birthday = $date;
            $birthday = substr($birthday, 0, 10);
            list($year, $month, $day) = explode("-", $birthday);
            $year_diff = date("Y") - $year;
            $month_diff = date("m") - $month;
            $day_diff  = date("d") - $day;
            if ($day_diff < 0 || $month_diff < 0) {
                $year_diff--;
            }
            return max(1, $year_diff) . '岁';
        } else {
            return $date;
        }
    }

    private function formatToHumanizeText($date){
        $return = $date;

        $time = strtotime($date);
        $t = time() - $time;
        $f = array(
            '31536000' => '年',
            '2592000' => '个月',
            '604800' => '星期',
            '86400' => '天',
            '3600' => '小时',
            '60' => '分钟',
            '1' => '秒'
        );
        foreach ($f as $k => $v) {
            if (0 != $c = floor($t / (int)$k)) {
                $return = $c . $v . '前';
                break;
            }
        }
        return $return;
    }
}
