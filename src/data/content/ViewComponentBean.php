<?php

namespace Qikecai\Sffrender\data\content;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 预览组件实体
 */
class ViewComponentBean extends BaseBean
{
    public string $label; // 标签
    public mixed $body; // 内容
    public string $type; // 组件类型 `image`|`html`|`boolean-radio`|`text`|`item-list`
    public string $name; // 名称
    public mixed $value; // 值
    public string $help; // 说明
    public ?int $block; // 分组编号
    public ?array $widget; // 挂件样式
}
