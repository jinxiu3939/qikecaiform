<?php

namespace Qikecai\Sffrender\driver\food;

use Qikecai\Sffrender\bean\FormSettingBean;
use Qikecai\Sffrender\driver\BaseDriver;
use Qikecai\Sffrender\driver\food\component\checkbox\Checkbox;
use Qikecai\Sffrender\driver\food\component\checkboxtree\CheckboxTree;
use Qikecai\Sffrender\driver\food\component\ckeditor\CkEditor;
use Qikecai\Sffrender\driver\food\component\clock\Clock;
use Qikecai\Sffrender\driver\food\component\custom\Custom;
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
use Qikecai\Sffrender\driver\food\component\popupcustom\PopupCustom;
use Qikecai\Sffrender\driver\food\component\popupradio\PopupRadio;
use Qikecai\Sffrender\driver\food\component\popuptree\PopupTree;
use Qikecai\Sffrender\driver\food\component\radio\Radio;
use Qikecai\Sffrender\driver\food\component\spreadsheet\Spreadsheet;
use Qikecai\Sffrender\driver\food\component\textarea\TextArea;
use Qikecai\Sffrender\driver\food\component\textbox\TextBox;
use Qikecai\Sffrender\driver\food\component\ueditor\UEditor;
use Qikecai\Sffrender\driver\food\component\video\Video;
use Qikecai\Sffrender\driver\food\config\FoodConfig;
use Qikecai\Sffrender\util\I18nHelper;

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
        'clock' => Clock::class,
        'custom' => Custom::class,
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
        'popup-custom' => PopupCustom::class,
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
     * 获取关联表单设置项目属性
     * 
     * @return array
     */
    public function getAssociateSettingItem(): array {
        return $this->formatSettingItem(FoodConfig::associateSearch);
    }

    /**
     * 获取关联检索组件类型
     * 
     * @return array
     */
    public function getAssociateSearchTypes(): array
    {
        return FoodConfig::associateSearchTypes;
    }

    /**
     * 表单设置
     * 
     * @param array $form 表单
     * @param array $block 块 [id, title, title_i18n]
     * @param array $lang 多语言 [code, label]
     * @return FormSettingBean
     */
    public function setting(array $form, ?array $block, ?array $lang): FormSettingBean
    {
        $return = new FormSettingBean($form);        

        /* 构造表单模型 */
        if ($lang) { // 多语言
            $lang_children = []; // 多语言块
            foreach ($lang as $l) {
                $lang_block = new FormSettingBean(['block_title' => $l['label'], 'block_id' => 'block_' . $l['code']]);
                $form_block = []; // 表单块
                foreach ($block as $b) {
                    $block_bean = $this->transformToBlock($b);
                    $block_bean->blockId .= '_' . $l['code']; // 多语言块标识
                    if (isset($b['title_i18n'][$l])) {
                        $block_bean->blockTitle = $b['title_i18n'][$l]; // 多语言块标题
                    }
                    $form_block[] = $block_bean;
                }
                $lang_block->children = $form_block; // 表单块作为多语言块的字块

                $lang_children[] = $lang_block;
            }
            $return->children = $lang_children;
        } else if ($block) {
            $children = [];
            foreach ($block as $b) {
                $children[] = $this->transformToBlock($b);
            }
            $return->children = $children;
        }

        return $return;
    }

    /**
     * 渲染表单组件
     * 
     * @return array
     */
    public function renderComponents(array $fields, array $data, ?array $lang): array {
        $items = [];
        if ($lang) { // 多语言
            foreach ($lang as $l) {
                foreach ($fields as $field) {
                    $component = $this->transformToComponent($field, $data);
                    if ($component) {
                        $append_fix = $l['code']; // 多语言标识
                        $component['name'] = I18nHelper::nominateFieldName($component['name'], $append_fix); // 多语言字段名称
                        $component['block'] .= '_' . $append_fix; // 多语言块标识
                        if (is_array($component['value']) && isset($component['value'][$append_fix])) { // 多语言值
                            $component['value'] = $component['value'][$append_fix];
                        }
                        if (isset($field['title_i18n'][$append_fix])) {
                            $component['label'] = $field['title_i18n'][$append_fix]; // 多语言字段标题
                        }
                        if (isset($field['description_i18n'][$append_fix])) {
                            $component['help'] = $field['description_i18n'][$append_fix]; // 多语言字段描述
                        }
                        $items[] = $component;
                    }
                } 
            }
        } else {
            foreach ($fields as $field) {
                $component = $this->transformToComponent($field, $data);
                if ($component) {
                    $items[] = $component;
                }
            }
        }
        return $items;
    }

    /**
     * 字段转换为组件
     * 
     * @param array $field
     * @param mixed $data
     * @return mixed
     */
    private function transformToComponent(array $field, $data) {
        $name = $field['field_name']; // 字段名称
        if (isset($field['type']) && $field['type']) {
            $type = is_array($field['type']) ? $field['type'][0] : $field['type']; // 字段类型
        } else {
            $type = 'text-box';
        }
        $field_data = $data[$name] ?? [];
        $component = $this->instance($type, $field, $field_data); // 实例化组件对象
        return $component ? $component->init() : false; // 初始化组件
    }

    /**
     * 字段分组转换为表单块
     * 
     * @param array $segment [id,title]
     * @return FormSettingBean
     */
    private function transformToBlock(array $segment) {
        $block = new FormSettingBean($segment);
        if (isset($segment['id'])) {
            $block->blockId = $segment['id'];
        }
        if (isset($segment['title']) && $segment['title']) {
            $block->blockTitle = $segment['title'];
        }
        return $block;
    }
}
