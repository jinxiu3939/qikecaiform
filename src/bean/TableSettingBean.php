<?php

namespace Qikecai\Sffrender\bean;

/**
 * 表格设置实体类
 *
 * @author qikecai <xiujixin@163.com>
 */
class TableSettingBean extends BaseBean
{
    public array $columns; // 列设置
    public string $mode;
    public bool $hideHeader;
    public bool $hideSubHeader;
    public string $noDataMessage;
    public array $attr;
    public array $actions;
    public $filter;
    public $edit;
    public $add;
    public $delete;
    public $pager;
    public $rowClassFunction;
    public $selectMode;
}
