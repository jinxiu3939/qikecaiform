<?php

namespace Qikecai\Sffrender\driver\cover;

use Qikecai\Sffrender\driver\BaseCardDriver;
use Qikecai\Sffrender\driver\cover\config\CoverConfig;
use Qikecai\Sffrender\data\items\ItemKeyValueBean;
use Qikecai\Sffrender\util\StrHelper;

/**
 * 平铺选项卡
 *
 * @author qikecai <xiujixin@163.com>
 */
class CoverDriver extends BaseCardDriver
{
    /**
     * 获取页面设置项目属性
     *
     * @return ItemKeyValueBean[]
     */
    public function getPageSettingItem(): array
    {
        return StrHelper::formatSettingItem(CoverConfig::pageSetting);
    }

    /**
     * 获取组件类型
     *
     * @return array
     */
    public function getComponentTypes(): array
    {
      return CoverConfig::componentTypes;
    }

    /**
     * 获取挂件设置项目属性
     *
     * @return array
     */
    public function getWidgetSettingItem(): array
    {
        return StrHelper::formatSettingItem(CoverConfig::widgetSetting);
    }
}
