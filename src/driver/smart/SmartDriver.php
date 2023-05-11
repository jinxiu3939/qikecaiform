<?php

namespace Qikecai\Sffrender\driver\smart;

use Qikecai\Sffrender\driver\BaseTableDriver;
use Qikecai\Sffrender\driver\smart\config\SmartConfig;
use Qikecai\Sffrender\util\StrHelper;

/**
 * 智能表格表单
 *
 * @author qikecai <xiujixin@163.com>
 */
class SmartDriver extends BaseTableDriver
{
    /**
     * 获取表格数据源类型
     * 
     * @return array
     */
    public function getTableSourceTypes(): array
    {
        return SmartConfig::tableSourceTypes;
    }

    /**
     * 表格列表行自定义操作名称
     * 
     * @return array
     */
    public function getTableCustomActions(): array
    {
        return SmartConfig::tableCustomActions;
    }
    
    /**
     * 获取单元格组件类型
     * 
     * @return array
     */
    public function getCellTypes(): array
    {
        return SmartConfig::cellTypes;
    }

    /**
     * 获取表格列设置项目属性
     * 
     * @return array
     */
    public function getTableSettingItem(): array
    {
        return StrHelper::formatSettingItem(SmartConfig::tableSetting);
    }

    /**
     * 获取表格列设置项目属性
     * 
     * @return array
     */
    public function getColumnSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::columnSetting);
    }

            /**
     * 获取表格样式设置项目属性
     * 
     * @return array
     */
    public function getTableAttrSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::tableAttrSetting);
    }

    /**
     * 获取表格操作设置项目属性
     * 
     * @return array
     */
    public function getActionsSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::actionSetting);
    }

    /**
     * 获取表格分页设置项目属性
     * 
     * @return array
     */
    public function getPagerSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::pagerSetting);
    }
}
