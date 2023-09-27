<?php

namespace Qikecai\Sffrender\driver\cover\config;

/**
 * 平铺卡片配置
 *
 * @author qikecai <xiujixin@163.com>
 */
class CoverConfig
{
    // 栅格布局宽度
    const gridWidth = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    // 组件类型
    const componentTypes = [
        'attachment',
        'boolean-radio',
        'custom',
        'html',
        'image',
        'item-list',
        'mark-down',
        'text'
    ];

    // 页面设置
    const pageSetting = [
        'height' => 'number',
        'width' => 'number'
    ];

    // 挂件设置
    const widgetSetting = [
        'width' => self::gridWidth,
        'label_width' => self::gridWidth,
        'body_width' => self::gridWidth,
        'renderComponent' => '',
        'onComponentInitFunction' => ''
    ];
}
