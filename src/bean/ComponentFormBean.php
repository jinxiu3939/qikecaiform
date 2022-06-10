<?php
namespace Qikecai\Sffrender\bean;

/**
 * 组件表单配置
 * @package Qikecai\Sffrender\bean
 */
class ComponentFormBean extends BaseBean
{
    public $data; // 自定义配置数据
    public $help; // 说明
    public $label; // 标签
    public $max; // 最大值
    public $min; // 最小值
    public $name; // 名称
    public $order; // 排序
    public $require; // 是否必填
    public $type; // 类型
    public $validator; // 验证器
    public $value; // 默认值
}
