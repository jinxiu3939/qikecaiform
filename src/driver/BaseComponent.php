<?php
/**
 * 组件基础类
 */

namespace Qikecai\Sffrender\driver;


use Qikecai\Sffrender\bean\ComponentFormBean;
use Qikecai\Sffrender\bean\ComponentViewBean;
use Qikecai\Sffrender\ComponentInterface;
use Qikecai\Sffrender\data\option\OptionBean;
use Qikecai\Sffrender\ComponentConfigInterface;

abstract class BaseComponent implements ComponentConfigInterface, ComponentInterface
{
    protected $field = []; // 字段配置
    protected $data = []; // 组件数据
    protected $dataNames = []; // 数据项名称
    protected $attributeNames = []; // 字段配置项名称

    public function __construct($field = [], $data = [])
    {
        $this->prepareConfig($field, $data);
    }

    /**
     * 初始化配置
     * @param $field array
     * @param $data array
     */
    private function prepareConfig($field, $data) {
        if ($field) {
            $this->field = $field;
        }
        if ($data) {
            $this->data = $data;
        }
    }

    /**
     * 配置表单组件
     * 辅助客户端表单组件构建表单
     * 赋值顺序依次是：字段基础配置，内容数据配置，字段自定义配置
     * 实现接口`ComponentInterface`
     * @param $field array 字段信息
     * @param $data array 数据值
     * @return array
     */
    public function init($field = [], $data = []) {
        $this->prepareConfig($field, $data);
        $base = new ComponentFormBean($this->field); // 组件基础属性配置
        $data = $this->parseData(); // 解析组件数据
        $field = $this->parseFieldConfig(); // 解析组件配置
        $component = array_merge($base->toArray(false), $data, $field);
        $component = $this->formatFormComponent($component);
        return $component;
    }

    /**
     * 预览组件内容
     * 实现接口`ComponentInterface`
     * @param $field array 字段信息
     * @param $data array 数据值
     * @return array
     */
    public function view($field = [], $data = []) {
        $this->prepareConfig($field, $data);
        $data = $this->parseData(); // 解析组件数据
        $bean = new ComponentViewBean($this->field);
        $bean->setProperty($data);
        $bean->text = $this->transformValueToText($bean->value); // 格式化显示文本
        $view = $this->formatViewContent($bean);
        return $view;
    }

    /**
     * 获取属性配置项
     * 实现接口`ComponentConfigInterface`
     * @return array
     */
    public function getAttributeConfigs()
    {
        return $this->attributeNames;
    }

    /**
     * 获取数据配置项
     * @return array
     */
    public function getDataConfigs()
    {
        return $this->dataNames;
    }

    /**
     * 解析组件数据
     * 过滤无效数据配置项
     */
    protected function parseData() {
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
     * @return array
     */
    protected function parseFieldConfig() {
        $return = [];
        $field = $this->field;

        /* 设置字段配置 */
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
    protected function formatFormComponent($component) {
        return $component;
    }

    /**
     * 格式化预览内容
     * @param ComponentViewBean $bean
     * @return array
     */
    protected function formatViewContent(ComponentViewBean $bean) {
        return $bean->toArray(false);
    }

    /**
     * 转换值为文本
     * @param $value mixed 值
     * @return string
     */
    protected function transformValueToText($value) {
        $text = $value;

        /* 从数据中获取文本 */
        $data = $this->data;
        if (isset($data['text']) && $data['text']) {
            $text = $data['text'];
        }

        return $text;
    }

    /**
     * 获取组件选项
     * @return array
     */
    protected function getOptions() {
        $field = $this->field;
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
    protected function fetchOptionText($value) {
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
}
