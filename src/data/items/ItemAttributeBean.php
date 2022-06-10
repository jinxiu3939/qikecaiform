<?php
/**
 * 子项/明细项属性实体
 */

namespace Qikecai\Sffrender\data\items;

use Qikecai\Sffrender\bean\BaseBean;

class ItemAttributeBean extends BaseBean
{
    public $text; // 标题
    public $value; // 名称
    public $type; // 类型 `drop-down`|`drop-down-filter`|`boolean-radio`|`number`
    public $options; // 类型选项
}
