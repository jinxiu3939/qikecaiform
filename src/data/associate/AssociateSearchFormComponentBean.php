<?php

namespace Qikecai\Sffrender\data\associate;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 关联检索表单组件实体
 */
class AssociateSearchFormComponentBean extends BaseBean
{
    public string $text; // 组件标题
    public string $type; // 组件类型 `drop-down`|`drop-down-filter`|`boolean-radio`|`number`|`textarea`|`datetime`|`date`
    public string $value; // 组件名称
    public string $help; // 组件备注
    public array $options; // 选项
    public int $size; // 选项异步检索分页大小
    public string $endpoint; // 选项异步检索地址
    public string $mode; // 选项异步检索方式
    public string $param; // 选项异步检索参数
}
