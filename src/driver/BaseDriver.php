<?php
/**
 * 表单驱动基础类
 */

namespace Qikecai\Sffrender\driver;

use Qikecai\Sffrender\ComponentConfigInterface;
use Qikecai\Sffrender\data\option\OptionBean;
use Qikecai\Sffrender\FormComposeInterface;
use Qikecai\Sffrender\FormConfigInterface;
use Qikecai\Sffrender\FormRenderInterface;
use Qikecai\Sffrender\FormViewInterface;

abstract class BaseDriver implements ComponentConfigInterface, FormRenderInterface, FormConfigInterface, FormViewInterface, FormComposeInterface
{
    const ATTRIBUTE_CONFIG_TYPE = 'attribute';
    const DATA_CONFIG_TYPE = 'data';

    protected $components = []; // 组件列表

    /**
     * 获取组件属性配置项
     */
    public function getAttributeConfigs() {
        return $this->getConfigs(self::ATTRIBUTE_CONFIG_TYPE);
    }

    /**
     * 获取数据配置
     */
    public function getDataConfigs()
    {
        return $this->getConfigs(self::DATA_CONFIG_TYPE);
    }

    /**
     * 获取组件类型
     * @return array
     */
    public function getComponentTypes()
    {
        return [];
    }

    /**
     * 获取验证器
     * @return array
     */
    public function getValidators()
    {
        return [];
    }

    /**
     * 实例化表单组件
     * @param $type string 组件类型
     * @param $field array
     * @param $data array
     * @return BaseComponent
     */
    protected function instance($type, $field = [], $data = []) {
        if (isset($this->components[$type])) {
            $component = $this->components[$type]; // 此处使用类型而不是构造路径，原因在于方便各驱动自己定义组件路径
            return new $component($field, $data);
        } else {
            return null;
        }
    }

    /**
     * @param $class string
     * @return ComponentConfigInterface
     */
    private function getComponentConfig($class) {
        return new $class();
    }

    /**
     * 获取配置项
     * @param $type string
     * @return OptionBean[]
     */
    private function getConfigs($type) {
        $return = [];
        $configs = [];
        foreach ($this->components as $key => $component) {
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
