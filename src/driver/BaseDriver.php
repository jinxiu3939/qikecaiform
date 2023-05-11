<?php

namespace Qikecai\Sffrender\driver;

use Qikecai\Sffrender\ComponentConfigInterface;
use Qikecai\Sffrender\data\items\ItemKeyValueBean;
use Qikecai\Sffrender\FormConfigInterface;
use Qikecai\Sffrender\FormRenderInterface;
use Qikecai\Sffrender\util\StrHelper;

/**
 * 表单驱动基础类
 *
 * @author qikecai <xiujixin@163.com>
 */
abstract class BaseDriver implements FormConfigInterface, FormRenderInterface
{
    const ATTRIBUTE_CONFIG_TYPE = 'attribute';
    const DATA_CONFIG_TYPE = 'data';

    protected $components = []; // 组件列表

    /**
     * 获取组件属性设置键值对
     * 
     * @return array
     */
    public function getComponentAttributeSettingItem(): array
    {
        $return = [];

        /* 获取组件属性 */
        $configs = [];
        foreach ($this->components as $component) {
            $configs = array_merge($configs, $this->getComponentConfig($component)->getAttributeConfigs());
        }
        $names = array_unique($configs); // 去重
        sort($names); // 排序
        foreach ($names as $name) {
            $return[] = new ItemKeyValueBean(['key' => $name, 'type' => 'input']); // 构造键值，所有值都为输入框，客户端不支持不同类型的相同键
        }

        return $return;
    }

    /**
     * 获取组件数据设置项目属性
     * 
     * @return array
     */
    public function getComponentDataSetting(): array
    {
        $return = [];

        /* 获取组件数据配置项 */
        $configs = [];
        foreach ($this->components as $component) {
            $configs = array_merge($configs, $this->getComponentConfig($component)->getDataConfigs());
        }
        
        $return = array_unique($configs);
        sort($return);

        return $return;
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
     * 获取关联检索组件类型
     * 
     * @return array
     */
    public function getAssociateSearchTypes(): array
    {
        return [];
    }

    /**
     * 获取页面设置项目属性
     * 
     * @return array
     */
    public function getPageSettingItem(): array
    {
        return [];
    }

    /**
     * 获取关联检索配置
     * @return array
     */
    public function getAssociateSettingItem(): array {
        return [];
    }

    /**
     * 获取表单设置项目属性
     * 
     * @return array
     */
    public function getFormSettingItem(): array
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
     * 格式化配置项键值对
     * 
     * @param array $setting 配置项
     * @return array
     */
    protected function formatSettingItem(array $setting): array {
        return StrHelper::formatSettingItem($setting);
    }

    /**
     * @param string $class
     * @return ComponentConfigInterface
     */
    private function getComponentConfig($class): ComponentConfigInterface
    {
        return new $class();
    }
}
