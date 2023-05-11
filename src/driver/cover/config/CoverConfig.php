<?php

namespace Qikecai\Sffrender\driver\cover\config;

/**
 * 平铺卡片配置
 *
 * @author qikecai <xiujixin@163.com>
 */
class CoverConfig
{
    // 组件类型
    const componentTypes = [
        'boolean-radio',
        'image',
        'html',
        'text'
    ];

    // 页面设置
    const pageSetting = [
        'height' => 'number',
        'width' => 'number'
    ];
}
