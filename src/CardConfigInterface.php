<?php

namespace Qikecai\Sffrender;

/**
 * 卡片配置接口
 */
interface CardConfigInterface
{
    /**
     * 获取页面设置项目属性
     * 
     * @return array
     */
    public function getPageSettingItem(): array;

    /**
     * 获取组件类型
     * 
     * @return array
     */
    public function getComponentTypes(): array;
}
