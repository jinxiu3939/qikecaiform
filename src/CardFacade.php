<?php

namespace Qikecai\Sffrender;

/**
 * 卡片引擎门面类
 */
class CardFacade
{
    /**
     * 获取组件类型
     * 
     * @return array
     */
    public static function getComponentTypes(): array
    {
        return DriverFactory::instanceCard()->getComponentTypes(); // 值选项
    }

    /**
     * 获取页面设置键值对
     * 
     * @return array
     */
    public static function getPageSettingItem(): array
    {
        return DriverFactory::instanceCard()->getPageSettingItem(); // 键选项
    }
}
