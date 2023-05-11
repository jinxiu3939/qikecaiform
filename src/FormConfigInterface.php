<?php
namespace Qikecai\Sffrender;

/**
 * 表单配置接口
 *
 * @author qikecai <xiujixin@163.com>
 */
interface FormConfigInterface
{
    /**
     * 获取页面设置项目属性
     * 
     * @return array
     */
    public function getPageSettingItem(): array;

    /**
     * 获取表单设置项目属性
     * 
     * @return array
     */
    public function getFormSettingItem(): array;

    /**
     * 获取关联表单设置项目属性
     * 
     * @return array
     */
    public function getAssociateSettingItem(): array;

    /**
     * 获取表单组件类型
     * 
     * @return array
     */
    public function getComponentTypes(): array;

    /**
     * 获取表单验证器
     * 
     * @return array
     */
    public function getValidators(): array;

    /**
     * 获取关联检索组件类型
     * 
     * @return array
     */
    public function getAssociateSearchTypes(): array;

    /**
     * 获取组件属性设置键值对
     * 
     * @return array
     */
    public function getComponentAttributeSettingItem(): array;

    /**
     * 获取组件数据设置名称
     * 
     * @return array
     */
    public function getComponentDataSetting(): array;    
}
