<?php
/**
 * 弹出式表单组件实体
 */

namespace Qikecai\Sffrender\data\associate;

use Qikecai\Sffrender\bean\BaseBean;

class PopupFormComponentBean extends BaseBean
{
    public $text; // 组件标题
    public $type; // 组件类型
    public $value; // 组件名称
    public $options; // 选项
}
