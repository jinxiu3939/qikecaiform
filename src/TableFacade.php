<?php

namespace Qikecai\Sffrender;

/**
 * 表格引擎门面类
 */
class TableFacade
{
    /**
     * 获取列表设置键值对
     * 
     * @return array
     */
    public static function getTableSettingItem(): array
    {
        return DriverFactory::instanceTable()->getTableSettingItem(); // 键选项
    }

    /**
     * 获取单元格组件类型
     * 
     * @return array
     */
    public static function getCellTypes(): array
    {
        return DriverFactory::instanceTable()->getCellTypes(); // 值选项
    }    

    /**
     * 获取表格数据源类型
     * 
     * @return array
     */
    public static function getTableSourceTypes(): array
    {
        return DriverFactory::instanceTable()->getTableSourceTypes(); // 值选项
    }

    /**
     * 表格列表行自定义操作名称
     * 
     * @return array
     */
    public static function getTableCustomActions(): array {
        return DriverFactory::instanceTable()->getTableCustomActions(); // 值选项
    }
}
