<?php

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\bean\FormSettingBean;
use Qikecai\Sffrender\data\FormDataFacade;

/**
 * 表单引擎门面类
 *
 * @author qikecai <xiujixin@163.com>
 */
class FormFacade
{
    /**
     * 获取组件属性配置项
     * 
     * @return array
     */
    public static function getComponentAttributeConfigs(): array
    {
        return FormFactory::instance()->getAttributeConfigs();
    }

    /**
     * 获取组件数据配置项
     * 
     * @return array
     */
    public static function getComponentDataConfigs(): array
    {
        return FormFactory::instance()->getDataConfigs();
    }

    /**
     * 获取组件类型
     * 
     * @return array
     */
    public static function getComponentType(): array
    {
        return FormFactory::instance()->getComponentTypes();
    }

    /**
     * 获取数据接口
     * 
     * @return array
     */
    public static function getDataInterface(): array
    {
        return FormDataFacade::getDataInterface();
    }

    /**
     * 获取表单设置键值对
     * 
     * @return array
     */
    public static function getSettingItem(): array
    {
        return FormFactory::instance()->getFormSettingItem(); // 键选项
    }

    /**
     * 获取表单页面设置键值对
     * 
     * @return array
     */
    public static function getPageSettingItem(): array
    {
        return FormFactory::instance()->getPageSettingItem(); // 键选项
    }

    /**
     * 获取关联表单设置键值对
     * 
     * @return array
     */
    public static function getAssociateSettingItem(): array
    {
        return FormFactory::instance()->getAssociateSettingItem(); // 键选项
    }

    /**
     * 渲染表单设置
     * 
     * @param array $form 表单
     * @param array $block 块
     * @param array $lang 多语言
     * @return FormSettingBean
     */
    public static function renderSetting(array $form, ?array $block, ?array $lang): FormSettingBean
    {
        return FormFactory::instance()->setting($form, $block, $lang);
    }

    /**
     * 预览表单
     * 
     * @param array $form 表单
     * @param array $field 字段
     * @param array $data 数据
     * @return array
     */
    public static function viewForm($form, $field, $data): array
    {
        $form_factory = FormFactory::instance();
        $return = $form_factory->view($form, $field, $data);
        return $return;
    }
}
