<?php

namespace Qikecai\Sffrender\data\linkage;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 联动项实体
 */
class LinkageBean extends BaseBean
{
    public $options; // 可选项 {text: string, value: mixed, parent: mixed}
    public $selected; // 当前值
    public $children; // 下级联动可选项 LinkageBean
}
