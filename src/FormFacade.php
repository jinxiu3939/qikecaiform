<?php
/**
 * 表单引擎门面类
 */

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\data\FormDataFacade;

class FormFacade
{
    /**
     * 获取组件属性配置项
     */
    public static function getComponentAttributeConfigs() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getAttributeConfigs();
        return $return;
    }

    /**
     * 获取组件数据配置项
     */
    public static function getComponentDataConfigs() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getDataConfigs();
        return $return;
    }

    /**
     * 获取组件类型
     */
    public static function getComponentType() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getComponentTypes();
        return $return;
    }

    /**
     * 获取数据接口选项
     */
    public static function getDataInterfaceOption() {
        $return = FormDataFacade::getInterfaceOption();
        return $return;
    }

    /**
     * 获取表单布局
     */
    public static function getLayout() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getLayouts();
        return $return;
    }

    /**
     * 获取表单验证器
     */
    public static function getValidator() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getValidators();
        return $return;
    }

    /**
     * 获取弹出框组件类型
     */
    public static function getPopupComponentType() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getPopupTypes();
        return $return;
    }

    /**
     * 获取弹出框组件类型
     */
    public static function getPopupSearchConfigs() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getAssociateSearchConfig();
        return $return;
    }

    /**
     * 渲染表单
     * @param $form array 表单
     * @param $field array 字段分组
     * @param $data array 数据，按照字段索引
     * @return array
     */
    public static function renderForm($form, $field, $data) {
        $form_factory = FormFactory::instance();
        $return = $form_factory->render($form, $field, $data);
        return $return;
    }

    /**
     * 预览表单
     * @param $form array 表单
     * @param $field array 字段
     * @param $data array 数据
     * @return array
     */
    public static function viewForm($form, $field, $data) {
        $form_factory = FormFactory::instance();
        $return = $form_factory->view($form, $field, $data);
        return $return;
    }

    /**
     * 获取组件尺寸
     */
    public static function getSize() {
        $form_factory = FormFactory::instance();
        $return = $form_factory->getSizes();
        return $return;
    }

    /**
     * 组合表单
     * @param $forms array 表单
     * @return array
     */
    public static function composeForm($forms, $titles, $config = []) {
        $form_factory = FormFactory::instance();
        $return = $form_factory->compose($forms, $titles, $config);
        return $return;
    }
}
