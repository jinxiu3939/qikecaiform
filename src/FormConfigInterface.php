<?php
/**
 * 表单配置接口
 */

namespace Qikecai\Sffrender;


interface FormConfigInterface
{
    /**
     * 获取组件类型配置
     * @return array
     */
    public function getComponentTypes();

    /**
     * 获取验证器配置
     * @return array
     */
    public function getValidators();

    /**
     * 获取布局配置
     * @return array
     */
    public function getLayouts();

    /**
     * 获取弹出框组件类型
     * @return array
     */
    public function getPopupTypes();

    /**
     * 获取关联检索配置
     * @return array
     */
    public function getAssociateSearchConfig();
}
