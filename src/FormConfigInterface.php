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
     * 获取表格类型
     * 
     * @return array
     */
    public function getTableTypes(): array;

    /**
     * 获取表格数据源类型
     * 
     * @return array
     */
    public function getTableSourceTypes(): array;

    /**
     * 表格列表行自定义操作名称
     * 
     * @return array
     */
    public function getTableCustomActions(): array;

    /**
     * 获取组件类型
     * 
     * @return array
     */
    public function getComponentTypes(): array;

    /**
     * 获取验证器
     * 
     * @return array
     */
    public function getValidators(): array;
}
