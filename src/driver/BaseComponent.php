<?php

namespace Qikecai\Sffrender\driver;


use Qikecai\Sffrender\bean\ComponentFormBean;
use Qikecai\Sffrender\ComponentInterface;
use Qikecai\Sffrender\data\option\OptionBean;
use Qikecai\Sffrender\ComponentConfigInterface;

/**
 * 组件基础类
 *
 * @author qikecai <xiujixin@163.com>
 */
abstract class BaseComponent implements ComponentConfigInterface, ComponentInterface
{
    protected $attribute = []; // 组件属性
    protected $data = []; // 组件数据
    protected $dataNames = []; // 数据项名称
    protected $attributeNames = []; // 属性配置项名称
    /* 字段映射表，客户端组件属性名称 => 数据库字段表字段名称 */
    protected $fieldSchema = [];

    public function __construct($attribute = [], $data = [])
    {
        $this->prepareConfig($attribute, $data);
    }

    /**
     * 配置表单组件
     * 辅助客户端表单组件构建表单
     * 赋值顺序依次是：字段基础配置，内容数据配置，字段自定义配置
     * 实现接口`ComponentInterface`
     * 
     * @param array $attribute 组件属性
     * @param array $data 组件数据
     * @return array
     */
    public function init(array $attribute = [], array $data = []): array
    {
        $this->prepareConfig($attribute, $data);
        $base = new ComponentFormBean($this->attribute); // 组件基础属性配置
        $data = $this->parseData(); // 解析组件数据
        $field = $this->parseFieldConfig(); // 解析组件配置
        $component = array_merge($base->toArray(false), $data, $field);
        $component = $this->formatFormComponent($component);
        return $component;
    }

    /**
     * 获取属性配置项
     * 实现接口`ComponentConfigInterface`
     * 
     * @return array
     */
    public function getAttributeConfigs(): array
    {
        return $this->attributeNames;
    }

    /**
     * 获取数据配置项
     * 
     * @return array
     */
    public function getDataConfigs(): array
    {
        return $this->dataNames;
    }

    /**
     * 解析组件数据
     * 过滤无效数据配置项
     */
    protected function parseData()
    {
        $return = [];
        $data = $this->data;

        /* 数据配置项 */
        foreach ($this->dataNames as $name) {
            if (isset($data[$name])) {
                $return[$name] = $data[$name];
            }
        }

        /* 默认值 */
        if (isset($data['value'])) {
            $return['value'] = $data['value'];
        }

        return $return;
    }

    /**
     * 解析字段自定义配置
     * 过滤无效字段配置
     * 
     * @return array
     */
    protected function parseFieldConfig()
    {
        $return = [];
        
        /* 设置字段配置 */
        $field = $this->attribute;
        if (isset($field['config']) && is_array($field['config'])) {
            foreach ($field['config'] as $name => $value) {
                if (in_array($name, $this->attributeNames)) {
                    $return[$name] = $value;
                }
            }
        }

        return $return;
    }

    /**
     * 格式化表单组件
     * @param array $component
     * @return array
     */
    protected function formatFormComponent($component)
    {
        return $component;
    }

    /**
     * 获取组件选项
     * @return array
     */
    protected function getOptions()
    {
        $field = $this->attribute;
        $data = $this->data;
        if (is_array($data) && isset($data['options'])) { // 自定义数据options
            $options = $data['options'];
        } elseif (isset($field['options']) && is_array($field['options']) && count($field['options']) > 0) { // 字段中配置的options
            $options = $field['options'];
        } else {
            $options = [];
        }
        return $options;
    }

    /**
     * 获取选项文本
     * @param $value string 值
     * @return string
     */
    protected function fetchOptionText($value)
    {
        $text = $value;
        $options = $this->getOptions();
        foreach ($options as $option) {
            if (!($option instanceof OptionBean)) {
                $option = new OptionBean($option);
            }
            if ($option->value == $value) {
                $text = $option->text;
                break;
            }
        }
        return $text;
    }

    /**
     * 初始化配置
     * 
     * @param array $attribute
     * @param array $data
     */
    private function prepareConfig(array $attribute, array $data): void
    {
        if ($attribute) {
            /* 属性重命名 */
            foreach ($this->fieldSchema as $name => $key) {
                if (isset($attribute[$key])) {
                    $attribute[$name] = $attribute[$key];
                    unset($attribute[$key]);
                }
            }
            $this->attribute = $attribute;
        }
        if ($data) {
            $this->data = $data;
        }
    }
}
