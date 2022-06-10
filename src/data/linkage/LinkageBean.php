<?php
/**
 * 联动项实体
 */

namespace Qikecai\Sffrender\data\linkage;

use Qikecai\Sffrender\bean\BaseBean;

class LinkageBean extends BaseBean
{
    public $options; // 可选项 OptionBean
    public $selected; // 当前值
    public $children; // 下级联动可选项 LinkageBean
}
