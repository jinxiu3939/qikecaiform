<?php

namespace qikecai\sffrender_test;

require 'vendor/autoload.php';

use Qikecai\Sffrender\CardFacade;
use Qikecai\Sffrender\FormFacade;
use Qikecai\Sffrender\TableFacade;

// echo ("获取选项卡组件类型:\n");
// var_dump(CardFacade::getComponentTypes());
// echo ("获取页面设置键值对:\n");
// var_dump(CardFacade::getPageSettingItem());
// echo ("获取组件属性设置键值对:\n");
// var_dump(FormFacade::getComponentAttributeSettingItem());
// echo ("获取组件数据设置名称:\n");
// var_dump(FormFacade::getComponentDataSetting());
// echo ("获取表单组件类型:\n");
// var_dump(FormFacade::getComponentTypes());
// echo ("获取数据接口:\n");
// var_dump(FormFacade::getDataInterface());
// echo ("获取表单设置键值对:\n");
// var_dump(FormFacade::getSettingItem());
// echo ("获取表单页面设置键值对:\n");
// var_dump(FormFacade::getPageSettingItem());
// echo ("获取关联表单设置键值对:\n");
// var_dump(FormFacade::getAssociateSettingItem());
// echo ("获取表单验证器:\n");
// var_dump(FormFacade::getValidators());
// echo ("获取列表设置键值对:\n");
// var_dump(TableFacade::getTableSettingItem());
// echo ("获取单元格组件类型:\n");
// var_dump(TableFacade::getCellTypes());
// echo ("获取表格数据源类型:\n");
// var_dump(TableFacade::getTableSourceTypes());
// echo ("表格列表行自定义操作名称:\n");
// var_dump(TableFacade::getTableCustomActions());
// echo ("生成表单配置:\n");
// $form = [
//     'validate' => 'true',
//     'foldBody' => false,
//     'bodyWidth' => 12,
//     'size' => 'extra-large',
//     'width' => 10,
//     'buttonWidth' => 12,
//     'buttonAlign' => 'center',
//     'buttonFixed' => false,
//     'buttonPosition' => '',
//     'hideSubmit' => false,
//     'submitText' => '提交',
//     'hideReset' => false,
//     'resetText' => '重置'
// ];
// $segment = [
//     ['id' => 1, 'title' => '基本信息', 'blockLayout' => 'tab', 'hideBlockBody' => false],
//     ['blockId' => 2, 'blockTitle' => '设置', 'blockLayout' => 'url', 'hideBlockBody' => true],
// ];
$lang = [
    ['code' => 'zh-Hans', 'label' => '简体中文'],
    ['code' => 'en', 'label' => '英文'],
];
// var_dump(FormFacade::renderSetting($form, $segment, $lang));
// echo ("渲染表单组件:\n");
$fields = [
    [
        'id' => 1,
        'title' => '标题',
        'description' => '文章标题',
        'max_length' => 255,
        'min_length' => 10,
        'field_name' => 'title',
        'weighting' => 0,
        'required' => true,
        'type' => ['text-box', 'textBox'],
        'validator' => 'chineseWord',
        'default' => '',
        'block_id' => 1,
    ],
    [
      'id' => 2,
      'title' => '描述',
      'description' => '文章简介',
      'max_length' => 255,
      'min_length' => 0,
      'field_name' => 'description',
      'weighting' => 0,
      'required' => false,
      'type' => ['text-area', 'textArea'],
      'validator' => '',
      'default' => '',
      'block_id' => 1,
  ],
];
var_dump(FormFacade::renderComponents($fields, lang:$lang));
