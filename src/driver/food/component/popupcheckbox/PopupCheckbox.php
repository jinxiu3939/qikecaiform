<?php
/**
 * 弹出式多选项
 */

namespace Qikecai\Sffrender\driver\food\component\popupcheckbox;

use Qikecai\Sffrender\driver\food\component\popupradio\PopupRadio;

class PopupCheckbox extends PopupRadio
{
    protected $attributeNames = [
        'drag', // 是否可拖动
        'readonly', // 是否只读，boolean
    ];

    protected $dataNames = [
        'options', // 选项
        'searchConfig', // 检索配置
        'text', // 关联内容显示文本
    ];
}
