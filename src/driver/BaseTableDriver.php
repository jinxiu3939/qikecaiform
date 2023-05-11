<?php

namespace Qikecai\Sffrender\driver;

use Qikecai\Sffrender\TableConfigInterface;

/**
 * 表格驱动基础类
 */
abstract class BaseTableDriver implements TableConfigInterface
{
    /**
     * 获取表格数据源类型
     * 
     * @return array
     */
    public function getTableSourceTypes(): array
    {
        return [];
    }

    /**
     * 表格列表行自定义操作名称
     * 
     * @return array
     */
    public function getTableCustomActions(): array
    {
        return [];
    }

    /**
     * 获取表格设置项目属性
     * 
     * @return array
     */
    public function getTableSettingItem(): array
    {
        return [];
    }

    /**
     * 获取单元格组件类型
     * 
     * @return array
     */
    public function getCellTypes(): array
    {
        return [];
    }

    /**
     * 获取表格列设置项目属性
     * 
     * @return array
     */
    public function getColumnSettingItem(): array {
        return [];
    }

    /**
     * 获取表格样式设置项目属性
     * 
     * @return array
     */
    public function getTableAttrSettingItem(): array {
        return [];
    }

    /**
     * 获取表格操作设置项目属性
     * 
     * @return array
     */
    public function getActionsSettingItem(): array {
        return [];
    }

    /**
     * 获取表格分页设置项目属性
     * 
     * @return array
     */
    public function getPagerSettingItem(): array {
        return [];
    }
}
