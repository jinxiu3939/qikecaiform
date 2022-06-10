<?php
/**
 * 弹出式多选项
 */

namespace Qikecai\Sffrender\driver\food\component\popupcheckbox;

use Qikecai\Sffrender\driver\food\component\popupradio\PopupRadio;

class PopupCheckbox extends PopupRadio
{
    protected $dataNames = [
        'options', // 选项
        'searchConfig', // 检索配置
        'text', // 关联内容显示文本
    ];

    /**
     * 转换值为文本
     * @param $value string 值
     * @return string
     */
    protected function transformValueToText($value) {
        $text = parent::transformValueToText($value);
        return is_array($text) ? implode(',', $text) : $text;
    }
}
