<?php

namespace Qikecai\Sffrender\data\option;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 表单选项
 * 
 * @package Qikecai\Sffrender\data\option
 */
class OptionBean extends BaseBean
{
    public string $text; // 名称/标签
    public mixed $value; // 值
    public string $title; // 标题/描述
    public string $items; // 合计项/标识
    public array $data; // 其他附加数据
}
