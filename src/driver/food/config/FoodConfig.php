<?php
/**
 * 表单配置
 */

namespace Qikecai\Sffrender\driver\food\config;

class FoodConfig {
    // 栅格布局宽度
    const gridWidth = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    // 验证器
    const validators = [
        'chineseWord',
        'email',
        'englishWord',
        'letterName',
        'url'
    ];

    // 页面设置
    const pageSetting = [
        'height' => 'number',
        'width' => 'number'
    ];

    // 表单设置
    const setting = [
        'validate' => 'boolean',
        'foldBody' => 'boolean',
        'bodyWidth' => self::gridWidth,
        'size' => ['extra-large', 'large', 'medium', 'small', 'tiny'],
        'width' => self::gridWidth,
        'buttonWidth' => self::gridWidth,
        'buttonAlign' => ['left', 'right', 'center'],
        'buttonFixed' => 'boolean',
        'buttonPosition' => ['right', 'bottom'],
        'hideSubmit' => 'boolean',
        'submitText' => '',
        'hideReset' => 'boolean',
        'resetText' => '',
        'blockId' => '',
        'blockTitle' => '',
        'blockLayout' => ['ul', 'tab', 'step'],
        'hideBlockBody' => 'boolean',
    ];

    // 组件类型 => 子类型（客户端工厂方法名称）
    const types = [
        'checkbox' => ['checkbox'],
        'checkbox-tree' => ['checkboxTree'],
        'ck-editor' => ['ckEditor'],
        'clock' => ['clock'],
        'custom' => ['custom'],
        'date-picker' => ['datePicker', 'dateRangePicker'],
        'drop-down-box' => ['dropDownBox'],
        'file' => ['file'],
        'image' => ['image'],
        'item-list' => ['itemList', 'keyValue'],
        'keyword' => ['keyword'],
        'linkage-box' => ['linkageBox'],
        'markdown-editor' => ['mdEditor'],
        'password-box' => ['passwordBox'],
        'popup-checkbox' => ['popupCheckbox'],
        'popup-custom' => ['popupCustom'],
        'popup-radio' => ['popupRadio'],
        'popup-tree' => ['popupTree'],
        'radio' => ['radio', 'booleanRadio'],
        'spreadsheet' => ['spreadsheet'],
        'text-area' => ['textArea'],
        'text-box' => [
            'textBox',
            'timeTextBox',
            'dateTimeLocalTextBox',
            'numberTextBox',
            'passwordTextBox',
            'rangeTextBox',
            'emailTextBox',
            'letterNameTextBox',
            'chineseWordTextBox',
            'englishWordTextBox',
            'mobileTextBox',
            'urlTextBox'
        ],
        'text-combine' => ['textCombine'],
        'u-editor' => ['uEditor'],
        'video' => ['video'],
    ];

    // 关联检索组件类型
    const associateSearchTypes = [
        'boolean-radio',
        'drop-down',
        'drop-down-filter',
        'input',
        'number'
    ];

    // 关联检索可配置项
    const associateSearch = [
        'mode' => ['async', 'sync'], // 检索方式
        'size' => 'number', // 检索分页大小
        'endpoint' => '', // 异步检索接口
    ];
}
