<?php

namespace Qikecai\Sffrender;

/**
 * 表格配置接口
 */
interface TableConfigInterface
{
    /**
     * 获取表格设置项目属性
     * 
     * @return array
     */
    public function getTableSettingItem(): array;

    /**
     * 获取单元格组件类型
     * 
     * @return array
     */
    public function getCellTypes(): array;

    /**
     * 获取表格数据源类型
     * 
     * @return array
     */
    public function getTableSourceTypes(): array;

    /**
     * 表格内容行自定义操作名称
     * 
     * @return array
     */
    public function getTableCustomActions(): array;

    /**
     * 获取表格列设置项目属性
     * 
     * @return array
     */
    public function getColumnSettingItem(): array;

    /**
     * 获取表格样式设置项目属性
     * 
     * @return array
     */
    public function getTableAttrSettingItem(): array;

    /**
     * 获取表格操作设置项目属性
     * 
     * @return array
     */
    public function getActionsSettingItem(): array;

    /**
     * 获取表格分页设置项目属性
     * 
     * @return array
     */
    public function getPagerSettingItem(): array;
}
