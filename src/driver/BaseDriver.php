<?php

namespace Qikecai\Sffrender\driver;

use Qikecai\Sffrender\ComponentConfigInterface;
use Qikecai\Sffrender\data\option\OptionBean;
use Qikecai\Sffrender\FormConfigInterface;
use Qikecai\Sffrender\FormRenderInterface;
use Qikecai\Sffrender\FormViewInterface;

/**
 * 表单驱动基础类
 *
 * @author qikecai <xiujixin@163.com>
 */
abstract class BaseDriver implements ComponentConfigInterface, FormRenderInterface, FormConfigInterface, FormViewInterface
{
    const ATTRIBUTE_CONFIG_TYPE = 'attribute';
    const DATA_CONFIG_TYPE = 'data';

    protected $components = []; // 组件列表

    /**
     * 获取组件属性配置项
     * 
     * @return array
     */
    public function getAttributeConfigs(): array
    {
        return $this->getConfigs(self::ATTRIBUTE_CONFIG_TYPE);
    }

    /**
     * 获取组件数据配置项
     * 
     * @return array
     */
    public function getDataConfigs(): array
    {
        return $this->getConfigs(self::DATA_CONFIG_TYPE);
    }

    /**
     * 获取组件类型
     * 
     * @return array
     */
    public function getComponentTypes(): array
    {
        return [];
    }

    /**
     * 获取验证器
     * 
     * @return array
     */
    public function getValidators(): array
    {
        return [];
    }

    /**
     * 实例化表单组件
     * 
     * @param string $type 组件类型
     * @param array $attribute 组件属性
     * @param array $data 组件数据
     * @return BaseComponent
     */
    protected function instance(string $type, array $attribute = [], $data = []): BaseComponent
    {
        if (isset($this->components[$type])) {
            $component = $this->components[$type]; // 此处使用类型而不是构造路径，原因在于方便各驱动自己定义组件路径
            return new $component($attribute, $data);
        } else {
            return null;
        }
    }

    /**
     * @param string $class
     * @return ComponentConfigInterface
     */
    private function getComponentConfig($class): ComponentConfigInterface
    {
        return new $class();
    }

    /**
     * 获取配置项
     * 
     * @param string $type
     * @return array
     */
    private function getConfigs($type): array
    {
        $return = [];
        $configs = [];
        foreach ($this->components as $component) {
            if ($type === self::ATTRIBUTE_CONFIG_TYPE) { // 属性配置
                $configs = array_merge($configs, $this->getComponentConfig($component)->getAttributeConfigs());
            } else { // 数据配置
                $configs = array_merge($configs, $this->getComponentConfig($component)->getDataConfigs());
            }
        }
        $names = array_unique($configs);
        sort($names);
        foreach ($names as $name) {
            $option = new OptionBean(['text' => $name, 'value' => $name]);
            array_push($return, $option);
        }
        return $return;
    }
}
