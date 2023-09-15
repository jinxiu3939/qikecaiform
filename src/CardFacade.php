<?php

namespace Qikecai\Sffrender;

use Qikecai\Sffrender\data\items\ItemKeyValueBean;

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
     * @return ItemKeyValueBean[]
     */
    public static function getPageSettingItem(): array
    {
        return DriverFactory::instanceCard()->getPageSettingItem(); // 键选项
    }

    /**
     * 获取挂件设置键值对
     *
     * @return ItemKeyValueBean[]
     */
    public static function getWidgetSettingItem(): array
    {
        return DriverFactory::instanceCard()->getWidgetSettingItem(); // 键选项
    }
}
