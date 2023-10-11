<?php

namespace Qikecai\Sffrender\data\associate;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 关联检索表单组件实体
 */
class AssociateSearchFormComponentBean extends BaseBean
{
    public string $text; // 组件标题
    public string $type; // 组件类型 `drop-down`|`drop-down-filter`|`boolean-radio`|`number`|`textarea`
    public string $value; // 组件名称
    public array $options; // 选项
    public $size; // 分页大小
    public string $endpoint; // 检索地址
    public string $mode; // 选项检索方式
    public string $param; // 检索参数
}
