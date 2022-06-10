<?php

namespace Qikecai\Sffrender\data\option;


use Qikecai\Sffrender\bean\BaseBean;

/**
 * 表单选项
 * @package Qikecai\Sffrender\data\option
 */
class OptionBean extends BaseBean
{
    public $text; // 名称/标签
    public $value; // 值
    public $title; // 标题/描述
    public $items; // 合计项/标识
    public $data; // 其他附加数据
}
