<?php
/**
 * 七棵菜表单类
 */

namespace Qikecai\Sffrender\driver\food;

use Qikecai\Sffrender\driver\BaseDriver;
use Qikecai\Sffrender\driver\food\component\checkbox\Checkbox;
use Qikecai\Sffrender\driver\food\component\checkboxtree\CheckboxTree;
use Qikecai\Sffrender\driver\food\component\ckeditor\CkEditor;
use Qikecai\Sffrender\driver\food\component\datepicker\DatePicker;
use Qikecai\Sffrender\driver\food\component\dropdownbox\DropDownBox;
use Qikecai\Sffrender\driver\food\component\file\File;
use Qikecai\Sffrender\driver\food\component\image\Image;
use Qikecai\Sffrender\driver\food\component\itemlist\ItemList;
use Qikecai\Sffrender\driver\food\component\keyword\Keyword;
use Qikecai\Sffrender\driver\food\component\linkagebox\LinkageBox;
use Qikecai\Sffrender\driver\food\component\markdowneditor\MarkdownEditor;
use Qikecai\Sffrender\driver\food\component\passwordbox\PasswordBox;
use Qikecai\Sffrender\driver\food\component\popupcheckbox\PopupCheckbox;
use Qikecai\Sffrender\driver\food\component\popupradio\PopupRadio;
use Qikecai\Sffrender\driver\food\component\popuptree\PopupTree;
use Qikecai\Sffrender\driver\food\component\radio\Radio;
use Qikecai\Sffrender\driver\food\component\spreadsheet\Spreadsheet;
use Qikecai\Sffrender\driver\food\component\textarea\TextArea;
use Qikecai\Sffrender\driver\food\component\textbox\TextBox;
use Qikecai\Sffrender\driver\food\component\ueditor\UEditor;
use Qikecai\Sffrender\driver\food\component\video\Video;
use Qikecai\Sffrender\driver\food\config\FoodConfig;

class FoodDriver extends BaseDriver
{
    const DEFAULT_COLUMN = [3, 9]; // 内容列标签和元素宽度比

    /* 组件列表，key为组件类型，必须和配置文件中的types保持一致 */
    protected $components = [
        'checkbox' => Checkbox::class,
        'checkbox-tree' => CheckboxTree::class,
        'ck-editor' => CkEditor::class,
        'date-picker' => DatePicker::class,
        'drop-down-box' => DropDownBox::class,
        'file' => File::class,
        'image' => Image::class,
        'item-list' => ItemList::class,
        'keyword' => Keyword::class,
        'linkage-box' => LinkageBox::class,
        'markdown-editor' => MarkdownEditor::class,
        'password-box' => PasswordBox::class,
        'popup-checkbox' => PopupCheckbox::class,
        'popup-radio' => PopupRadio::class,
        'popup-tree' => PopupTree::class,
        'radio' => Radio::class,
        'spreadsheet' => Spreadsheet::class,
        'text-area' => TextArea::class,
        'text-box' => TextBox::class,
        'u-editor' => UEditor::class,
        'video' => Video::class,
    ];

    /**
     * 获取组件类型
     * @return array
     */
    public function getComponentTypes()
    {
        return FoodConfig::types;
    }

    /**
     * 获取验证器
     * @return array
     */
    public function getValidators()
    {
        return FoodConfig::validators;
    }

    /**
     * 获取布局配置
     * @return array
     */
    public function getLayouts() {
        return FoodConfig::layouts;
    }

    /**
     * 获取弹出框组件类型
     * @return array
     */
    public function getPopupTypes()
    {
        return FoodConfig::popupTypes;
    }

    /**
     * 获取关联检索配置
     * @return array
     */
    public function getAssociateSearchConfig() {
        return FoodConfig::popupSearch;
    }

    /**
     * 渲染表单
     * @param $form array 表单信息
     * @param $group_field array 分组的字段
     * @param array $data
     * @return array
     */
    public function render($form, $group_field, $data)
    {
        $content = [
            'layout' => $form && isset($form['layout']) ? $form['layout'] : '', // 布局方式
            'models' => [], // 分组的字段
        ];
        $models = [];
        foreach ($group_field as $group) {
            $model = [
                'column' => isset($group['column']) ? $group['column'] : self::DEFAULT_COLUMN, // label和input列宽比
                'title' => isset($group['title']) ? $group['title'] : '', // 分组标题
                'size' => isset($group['size']) ? $group['size'] : 'large', // 组件宽度
                'hide' => isset($group['hide']) ? $group['hide'] : false, // 是否隐藏组件体
                'items' => [] // 字段
            ];
            $items = [];
            foreach ($group['fields'] as $field) {
                $name = $field['name'];
                $type = is_array($field['type']) ? $field['type'][0] : $field['type']; // 字段类型
                $field_data = isset($data[$name]) ? $data[$name] : [];
                $component = $this->instance($type, $field, $field_data); // 实例化组件类
                if ($component) {
                    array_push($items, $component->init()); // 初始化组件
                }
            }
            $model['items'] = $items;
            array_push($models, $model);
        }
        $content['models'] = $models;
        return $content;
    }

    /**
     * 预览表单
     * @param $form array
     * @param $group_fields array
     * @param $data array
     * @return array
     */
    public function view($form, $group_fields, $data)
    {
        $content = [
            'layout' => $form && isset($form['layout']) ? $form['layout'] : '', // 布局方式
            'segments' => [], // 字段分组
        ];
        $segments = [];
        foreach ($group_fields as $group) {
            $segment = [
                'column' => isset($group['column']) && $group['column'] ? $group['column'] : self::DEFAULT_COLUMN, // label和input列宽比
                'title' => isset($group['title']) ? $group['title'] : '', // 分组标题
                'fields' => [] // 字段
            ];
            $items = [];
            foreach ($group['fields'] as $field) {
                $name = $field['name'];
                $type = is_array($field['type']) ? $field['type'][0] : $field['type']; // 字段类型
                $field_data = isset($data[$name]) ? $data[$name] : [];
                $component = $this->instance($type, $field, $field_data); // 实例化组件类
                if ($component) {
                    array_push($items, $component->view()); // 预览组件
                }
            }
            $segment['fields'] = $items;
            array_push($segments, $segment);
        }
        $content['segments'] = $segments;
        return $content;
    }
}
