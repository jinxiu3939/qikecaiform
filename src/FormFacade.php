<?php

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\driver\BaseComponent;
use Qikecai\Sffrender\bean\FormSettingBean;
use Qikecai\Sffrender\data\FormDataFacade;
use Qikecai\Sffrender\data\items\ItemKeyValueBean;

/**
 * 表单引擎门面类
 *
 * @author qikecai <xiujixin@163.com>
 */
class FormFacade
{
    /**
     * 获取组件属性设置键值对
     * 
     * @return ItemKeyValueBean[]
     */
    public static function getComponentAttributeSettingItem(): array
    {
        return DriverFactory::instance()->getComponentAttributeSettingItem(); // 键选项
    }

    /**
     * 获取组件数据设置
     * 
     * @return array
     */
    public static function getComponentDataSetting(): array
    {
        return DriverFactory::instance()->getComponentDataSetting(); // 值选项
    }

    /**
     * 获取组件类型
     * 
     * @return array
     */
    public static function getComponentTypes(): array
    {
        return DriverFactory::instance()->getComponentTypes(); // 值选项
    }

    /**
     * 获取数据接口
     * 
     * @return string[]
     */
    public static function getDataInterface(): array
    {
        return FormDataFacade::getDataInterface();
    }

    /**
     * 获取表单设置键值对
     * 
     * @return ItemKeyValueBean[]
     */
    public static function getSettingItem(): array
    {
        return DriverFactory::instance()->getFormSettingItem(); // 键选项
    }

    /**
     * 获取表单页面设置键值对
     * 
     * @return ItemKeyValueBean[]
     */
    public static function getPageSettingItem(): array
    {
        return DriverFactory::instance()->getPageSettingItem(); // 键选项
    }

    /**
     * 获取关联表单设置键值对
     * 
     * @return ItemKeyValueBean[]
     */
    public static function getAssociateSettingItem(): array
    {
        return DriverFactory::instance()->getAssociateSettingItem(); // 键选项
    }

    /**
     * 获取表单验证器
     * 
     * @return array
     */
    public static function getValidators(): array 
    {
        return DriverFactory::instance()->getValidators(); // 值选项
    }
    
    /**
     * 获取关联检索类型
     * 
     * @return array
     */
    public static function getAssociateSearchTypes(): array 
    {
        return DriverFactory::instance()->getAssociateSearchTypes(); // 值选项
    }

    /**
     * 渲染表单设置
     * 
     * @param array $form 表单
     * @param array $block 块
     * @param array $lang 多语言
     * @return FormSettingBean
     */
    public static function renderSetting(array $form, ?array $block = [], ?array $lang = []): FormSettingBean
    {
        return DriverFactory::instance()->setting($form, $block, $lang);
    }

    /**
     * 渲染表单组件
     * @param array $fields
     * @param array $data
     * @param array|null $lang
     * @return BaseComponent[]
     */
    public static function renderComponents(array $fields, ?array $data = [], ?array $lang = []): array {
        return DriverFactory::instance()->renderComponents($fields, $data, $lang);
    }
}
