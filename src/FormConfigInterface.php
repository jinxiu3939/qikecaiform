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
     * 获取表单设置值
     * 
     * @param string $setting_name 属性名称
     * @return array
     */
    public function getSettingValues(string $setting_name): array;

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
