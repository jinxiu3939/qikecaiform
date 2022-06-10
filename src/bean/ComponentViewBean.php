<?php
namespace Qikecai\Sffrender\bean;

/**
 * 组件详情预览
 */
class ComponentViewBean extends BaseBean
{
    public $label; // 标签
    public $text; // 内容/显示值
    public $name; // 名称
    public $type; // 类型
    public $value; // 值
    public $help; // 说明
    public $order; // 排序
    public $data; // 自定义预览数据
}
