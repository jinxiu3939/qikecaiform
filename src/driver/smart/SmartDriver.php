<?php

namespace Qikecai\Sffrender\driver\smart;

use Qikecai\Sffrender\bean\TableSettingBean;
use Qikecai\Sffrender\ComponentInterface;
use Qikecai\Sffrender\driver\BaseTableDriver;
use Qikecai\Sffrender\driver\smart\component\associate\AssociateCell;
use Qikecai\Sffrender\driver\smart\component\boolean\BooleanCell;
use Qikecai\Sffrender\driver\smart\component\html\HtmlCell;
use Qikecai\Sffrender\driver\smart\component\image\ImageCell;
use Qikecai\Sffrender\driver\smart\component\long\LongWordCell;
use Qikecai\Sffrender\driver\smart\component\object\ObjectCell;
use Qikecai\Sffrender\driver\smart\config\SmartConfig;
use Qikecai\Sffrender\util\StrHelper;

/**
 * 智能表格表单
 *
 * @author qikecai <xiujixin@163.com>
 */
class SmartDriver extends BaseTableDriver
{
    /* 组件列表，可以为类型，必须和配置文件中的type.custom保持一致 */
    protected $components = [
        'associate' => AssociateCell::class,
        'boolean' => BooleanCell::class,
        'html' => HtmlCell::class,
        'image' => ImageCell::class,
        'long' => LongWordCell::class,
        'object' => ObjectCell::class,
    ];

    /**
     * 获取表格数据源类型
     * 
     * @return array
     */
    public function getTableSourceTypes(): array
    {
        return SmartConfig::tableSourceTypes;
    }

    /**
     * 表格列表行自定义操作名称
     * 
     * @return array
     */
    public function getTableCustomActions(): array
    {
        return SmartConfig::tableCustomActions;
    }
    
    /**
     * 获取单元格组件类型
     * 
     * @return array
     */
    public function getCellTypes(): array
    {
        return SmartConfig::cellTypes;
    }

    /**
     * 获取表格列设置项目属性
     * 
     * @return array
     */
    public function getTableSettingItem(): array
    {
        return StrHelper::formatSettingItem(SmartConfig::tableSetting);
    }

    /**
     * 获取表格列设置项目属性
     * 
     * @return array
     */
    public function getColumnSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::columnSetting);
    }

            /**
     * 获取表格样式设置项目属性
     * 
     * @return array
     */
    public function getTableAttrSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::tableAttrSetting);
    }

    /**
     * 获取表格操作设置项目属性
     * 
     * @return array
     */
    public function getActionsSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::actionSetting);
    }

    /**
     * 获取表格分页设置项目属性
     * 
     * @return array
     */
    public function getPagerSettingItem(): array {
        return StrHelper::formatSettingItem(SmartConfig::pagerSetting);
    }

    /**
     * 表格设置
     *
     * @param array $setting
     * @return TableSettingBean
     */
    public function setting(array $setting): TableSettingBean {
        if (isset($setting['columns'])) {
            $setting['columns'] = $this->renderColumns($setting['columns']);
        }
        return new TableSettingBean($setting);
    }

    /**
     * 渲染表格头
     * @param $columns array 排序之后的列
     * @param $table array 列信息
     * @return array
     */
    public function renderColumns($columns) {
        $head = [];

        foreach ($columns as $field) {
            $cell = $this->initHeadCell(); // 初始化单元格
            $intersect_cell = array_intersect_key($field, $cell); // 返回键相同的元素
            $cell = array_merge($cell, $intersect_cell); // field相同键的元素覆盖cell

            if (isset($cell['type'])) {
                /* 类型格式化 */
                if (is_array($cell['type'])) {
                    $cell['renderComponent'] = isset($cell['type'][1]) ? $cell['type'][1] : null;
                    $cell['type'] = isset($cell['type'][0]) ? $cell['type'][0] : SmartConfig::COLUMN_TYPE_TEXT;
                }

                /* 自定义渲染组件属性赋值 */
                if ($cell['type'] === SmartConfig::COLUMN_TYPE_CUSTOM) {
                    $cell = $this->instance($cell['renderComponent'])->init($cell);
                }
            }

            array_push($head, $cell);
        }

        return $head;
    }

    /**
     * 初始化表头单元
     */
    private function initHeadCell() {
        $keys = array_keys(SmartConfig::columnSetting);
        $values = array_fill(0, count($keys), null);  // 使用null填充数组使其元素个数和$keys相同, 索引键由0开始
        $cell = array_combine($keys, $values);
        return $cell;
    }

    /**
     * 实例化组件
     * @return ComponentInterface
     */
    private function instance($type): ComponentInterface {
        $component = $this->components[$type];
        return new $component();
    }
}
