<?php

namespace Qikecai\Sffrender\driver\food;

use Qikecai\Sffrender\bean\FormSettingBean;
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

/**
 * 七棵菜表单类
 */
class FoodDriver extends BaseDriver
{
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
     * 获取表格类型
     * 
     * @return array
     */
    public function getTableTypes(): array
    {
        return FoodConfig::tableTypes;
    }

    /**
     * 获取表格数据源类型
     * 
     * @return array
     */
    public function getTableSourceTypes(): array
    {
        return FoodConfig::tableSourceTypes;
    }

    /**
     * 表格列表行自定义操作名称
     * 
     * @return array
     */
    public function getTableCustomActions(): array
    {
        return FoodConfig::tableCustomActions;
    }

    /**
     * 获取组件类型
     * 
     * @return array
     */
    public function getComponentTypes(): array
    {
        return FoodConfig::types;
    }

    /**
     * 获取验证器
     * 
     * @return array
     */
    public function getValidators(): array
    {
        return FoodConfig::validators;
    }

    /**
     * 获取页面设置项目属性
     * 
     * @return array
     */
    public function getPageSettingItem(): array
    {
        return $this->formatSettingItem(FoodConfig::pageSetting);
    }

    /**
     * 获取表单设置项目属性
     * 
     * @return array
     */
    public function getFormSettingItem(): array
    {
        return $this->formatSettingItem(FoodConfig::setting);
    }

    /**
     * 获取关联检索配置
     * @return array
     */
    public function getAssociateSettingItem(): array {
        return $this->formatSettingItem(FoodConfig::popupSearch);
    }

    /**
     * 获取弹出框组件类型
     * @return array
     */
    public function getPopupTypes(): array
    {
        return FoodConfig::popupTypes;
    }

    /**
     * 表单设置
     * 
     * @param array $form 表单
     * @param array $block 块
     * @param array $lang 多语言
     * @return FormSettingBean
     */
    public function setting(array $form, ?array $block, ?array $lang): FormSettingBean
    {
        /* 构造表单模型 */
        $models = [];
        foreach ($block as $group) {
            $model = $this->transformToSegment($group);

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

        return new FormSettingBean([
            'fold' => $form && isset($form['fold']) ? $form['fold'] : false, // 是否折叠表单
            'height' => $form && isset($form['height']) ? $form['height'] : '', // 高度
            'layout' => $form && isset($form['layout']) ? $form['layout'] : '', // 布局方式
            'models' => $models, // 表单模型
            'width' => $form && isset($form['width']) ? $form['width'] : '', // 宽度
        ]);
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
        $segments = [];
        foreach ($group_fields as $group) {
            $segment = $this->transformToSegment($group);

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

        return [
            'layout' => $form && isset($form['layout']) ? $form['layout'] : '', // 布局方式
            'segments' => $segments, // 字段分组
        ];
    }

    /**
     * 获取组件尺寸
     * @return array
     */
    public function getSizes() {
        return FoodConfig::sizes;
    }

    /**
     * 组合表单
     * @param $form array 表单，通过FormRenderInterface接口生成
     * @param $title string 标题
     * @param $config array 配置，保留字段
     * @return mixed
     */
    public function compose($form, $title, $config = []) {
        $new_form = ['fold' => false, 'height' => '', 'layout' => '', 'models' => [], 'tree' => [], 'width' => ''];
        $new_form = array_merge($new_form, $config);
        $tree = [];
        foreach ($form as $k => $f) {
            $tree[] = ['components' => $f['models'], 'title' => isset($title[$k]) ? $title[$k] : $k]; // 构造三级表单

            /* 保留表单有效值 */
            foreach ($f as $j => $i) {
                if ($i) {
                    $new_form[$j] = $i;
                }
            }
        }
        $new_form['models'] = []; // 清空二级表单
        $new_form['tree'] = $tree; // 使用三级表单
        return $new_form;
    }

    private function transformToSegment($group) {
        return [
            'title' => isset($group['title']) ? $group['title'] : '', // 分组标题
            'size' => isset($group['size']) ? $group['size'] : 'large', // 组件宽度
            'hide' => isset($group['hide']) ? $group['hide'] : false, // 是否隐藏组件体
        ];
    }
}
