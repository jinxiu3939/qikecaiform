<?php
/**
 * 表单配置
 */

namespace Qikecai\Sffrender\driver\food\config;

class FoodConfig {
    // 布局方式
    const layouts = [
    'ul',
    'tab',
    'step'
    ];

    // 验证器
    const validators = [
    'chineseWord',
    'email',
    'englishWord',
    'letterName',
    'url'
    ];

    // 类型 => 子类型（客户端工厂方法名称）
    const types = [
        'checkbox' => ['checkbox'],
        'checkbox-tree' => ['checkboxTree'],
        'ck-editor' => ['ckEditor'],
        'date-picker' => ['datePicker'],
        'drop-down-box' => ['dropDownBox'],
        'file' => ['file'],
        'image' => ['image'],
        'item-list' => ['itemList'],
        'keyword' => ['keyword'],
        'linkage-box' => ['linkageBox'],
        'markdown-editor' => ['mdEditor'],
        'password-box' => ['passwordBox'],
        'popup-checkbox' => ['popupCheckbox'],
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
        'u-editor' => ['uEditor'],
        'video' => ['video'],
    ];

    // 弹出框检索组件类型：页面检索子类型 => 弹出框检索类型
    const popupTypes = [
        'boolean-radio',
        'drop-down',
        'drop-down-filter',
        'input',
        'number'
    ];

    // 弹出框检索可配置项
    const popupSearch = [
        'mode',
        'size',
        'endpoint',
    ];
}
