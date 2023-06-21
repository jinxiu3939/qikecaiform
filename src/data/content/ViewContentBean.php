<?php

namespace Qikecai\Sffrender\data\content;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 预览内容实体
 */
class ViewContentBean extends BaseBean
{
    public string $title; // 标题
    public array $fields; // 组件
}
