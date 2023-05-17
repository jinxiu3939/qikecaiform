<?php

namespace Qikecai\Sffrender\driver\smart\config;

/**
 * 智能表格配置
 *
 * @author qikecai <xiujixin@163.com>
 */
class SmartConfig
{
    /* 表格列检索类型 */
    const COLUMN_FILTER_FUNCTION_ASSOCIATE = 'associate';
    const COLUMN_FILTER_FUNCTION_BOOLEAN = 'boolean';

    /* 单元格类型 */
    const COLUMN_TYPE_TEXT = 'text';
    const COLUMN_TYPE_CUSTOM = 'custom';

    // 表格数据源类型
    const tableSourceTypes = [
        'sync',
        'async'
    ];

    // 操作设置
    const actionSetting = [
        'columnTitle' => '',
        'add' => 'boolean',
        'edit' => '',
        'delete' => '',
        'position' => ['left', 'right']
    ];

    // 分页设置
    const pagerSetting = [
        'display' => 'boolean',
        'perPage' => '',
    ];

    // 表格行自定义操作名称
    const tableCustomActions = [
        'edit',
        'delete',
        'log',
        'copy',
        'view'
    ];

    // 表格单元格类型 => 子类型
    const cellTypes = [
        'custom' => [
            'associate',
            'boolean',
            'html',
            'image',
            'long',
            'object'
        ],
        'text' => [],
        'html' => [],
    ];

    // 列设置
    const columnSetting = [
        'fieldName' => '',
        'title' => '',
        'type' => '',
        'class' => '',
        'width' => '',
        'hide' => 'boolean',
        'editor' => '',
        'filter' => 'boolean',
        'renderComponent' => '',
        'sortDirection' => ['asc', 'desc'],
        'sort' => 'boolean',
        'editable' => 'boolean',
        'addable' => 'boolean',
        'compareFunction' => '',
        'valuePrepareFunction' => '',
        'filterFunction' => '',
        'onComponentInitFunction' => ''
    ];

    // 表格设置
    const tableSetting = [
        'mode' => ['external', 'inline'],
        'hideHeader' => 'boolean',
        'hideSubHeader' => 'boolean',
        'noDataMessage' => '',
        'rowClassFunction' => ''
    ];

    // 表格属性设置
    const tableAttrSetting = [
        'id' => '',
        'class' => ''
    ];
}