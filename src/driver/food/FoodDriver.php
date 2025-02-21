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
use Qikecai\Sffrender\driver\food\component\attachment\Attachment;
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
use Qikecai\Sffrender\driver\food\component\textcombine\TextCombine;
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
        'attachment' => Attachment::class,
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
        'text-combine' => TextCombine::class,
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
     * @param array $block_list 字段块 [id, title, title_i18n]
     * @param array $lang 多语言 [code, label]
     * @return FormSettingBean
     */
    public function setting(array $form, ?array $block_list, ?array $langs): FormSettingBean
    {
        $return = new FormSettingBean($form);        

        /* 构造表单快 */
        if ($langs) { // 多语言
            $lang_blocks = []; // 多语言块
            foreach ($langs as $lang) {
                $append_fix = $lang['code']; // 多语言标识
                /* 语言块编号约定为0 */
                $lang_block = new FormSettingBean(['block_title' => $lang['label'], 'block_id' => '0_' . $append_fix]);
                $form_blocks = []; // 表单块
                /* 为每个表单快添加多语言标识，包括编号和标题 */
                foreach ($block_list as $block) {
                    $form_block = $this->transformToBlock($block);
                    $form_block->blockId .= '_' . $append_fix; // 多语言块标识
                    if (!empty($block['title_i18n']) && isset($block['title_i18n'][$append_fix])) {
                        $form_block->blockTitle = $block['title_i18n'][$append_fix]; // 多语言块标题
                    }
                    $form_blocks[] = $form_block;
                }
                $lang_block->children = $form_blocks; // 表单块作为多语言块的子块

                $lang_blocks[] = $lang_block;
            }
            $return->children = $lang_blocks;
        } else if ($block_list) { // 表单快
            $children = [];
            foreach ($block_list as $block) {
                $children[] = $this->transformToBlock($block);
            }
            $return->children = $children;
        }

        return $return;
    }

    /**
     * 渲染表单组件
     *
     * @param array $fields 字段
     * @param array $data 数据 [id, title, title_i18n]
     * @param array $langs 多语言 [code, label]
     * @return array
     */
    public function renderComponents(array $fields, array $data, ?array $langs): array {
        $items = [];
        if ($langs) { // 多语言
            /* 为每个字段添加多语言标识，包括名称、块、标签和提示；并且设置多语言值value */
            foreach ($langs as $lang) {
                foreach ($fields as $field) {
                    $component = $this->transformToComponent($field, $data);
                    if ($component) {
                        $append_fix = $lang['code']; // 多语言标识
                        $component['name'] = I18nHelper::nominateFieldName($component['name'], $append_fix); // 多语言字段名称
                        if (isset($component['block'])) {
                            $component['block'] .= '_' . $append_fix; // 多语言块标识
                        }
                        if (isset($component['value']) && is_array($component['value']) && $component['value']) { // 获取多语言值
                            $component['value'] = $component['value'][$append_fix] ?? '';
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
