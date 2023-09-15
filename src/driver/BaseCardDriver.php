<?php

namespace Qikecai\Sffrender\driver;

use Qikecai\Sffrender\CardConfigInterface;

/**
 * 卡片驱动基础类
 */
abstract class BaseCardDriver implements CardConfigInterface
{
    /**
     * 获取页面设置项目属性
     *
     * @return array
     */
    public function getPageSettingItem(): array
    {
        return [];
    }

    /**
     * 获取组件类型
     *
     * @return array
     */
    public function getComponentTypes(): array
    {
        return [];
    }

    /**
     * 获取挂件设置项目属性
     *
     * @return array
     */
    public function getWidgetSettingItem(): array
    {
        return [];
    }
}
