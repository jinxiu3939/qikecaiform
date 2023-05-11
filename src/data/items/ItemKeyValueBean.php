<?php

namespace Qikecai\Sffrender\data\items;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 键值对实体
 */
class ItemKeyValueBean extends BaseBean
{
    public string $type; // 组件类型 `drop-down`|`drop-down-filter`|`boolean-radio`|`number`|`textarea`|`input`
    public string $key; // 键
    public array $options; // 值选项
}
