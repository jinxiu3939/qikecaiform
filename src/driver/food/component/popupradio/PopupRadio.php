<?php
/**
 * 弹出式单选项
 */

namespace Qikecai\Sffrender\driver\food\component\popupradio;


use Qikecai\Sffrender\driver\food\component\Component;

class PopupRadio extends Component
{
    protected $attributeNames = [
        'readonly', // 是否只读
        'size' // 尺寸
    ];

    protected $dataNames = [
        'options', // 选项
        'searchConfig', // 检索配置
        'text', // 关联内容显示文本
    ];
}
