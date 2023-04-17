<?php
namespace Qikecai\Sffrender\bean;

/**
 * 组件表单配置实体
 * 
 * @package Qikecai\Sffrender\bean
 */
class ComponentFormBean extends BaseBean
{
    public array $payload; // 自定义配置数据
    public string $help; // 说明
    public string $label; // 标签
    public string $max; // 最大值
    public string $min; // 最小值
    public string $name; // 名称
    public int $order; // 排序
    public bool $require; // 是否必填
    public string $type; // 类型
    public string $validator; // 验证器
    public mixed $value; // 默认值
    public string $block; // block标识
    public bool $disabled; // 是否禁用
}
