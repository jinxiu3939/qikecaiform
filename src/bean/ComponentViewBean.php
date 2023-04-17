<?php
namespace Qikecai\Sffrender\bean;

/**
 * 组件详情预览实体
 */
class ComponentViewBean extends BaseBean
{
    public string $label; // 标签
    public string $text; // 内容/显示值
    public string $name; // 名称
    public string $type; // 类型
    public mixed $value; // 表单值
    public string $help; // 说明
    public string $order; // 排序
    public array $payload; // 自定义预览数据
}
