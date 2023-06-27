<?php
/**
 * 表单数据门面类
 */

namespace Qikecai\Sffrender\data;

use Qikecai\Sffrender\data\associate\AssociateNameInterface;
use Qikecai\Sffrender\data\associate\AssociateSearchConfigInterface;
use Qikecai\Sffrender\data\content\TableContentInterface;
use Qikecai\Sffrender\data\content\TextContentInterface;
use Qikecai\Sffrender\data\content\ViewContentInterface;
use Qikecai\Sffrender\data\editor\EditorConfigInterface;
use Qikecai\Sffrender\data\file\FileCrawlConfigInterface;
use Qikecai\Sffrender\data\file\FileCropperConfigInterface;
use Qikecai\Sffrender\data\file\FileSearchConfigInterface;
use Qikecai\Sffrender\data\file\FileUploadConfigInterface;
use Qikecai\Sffrender\data\items\ItemAttributeInterface;
use Qikecai\Sffrender\data\items\ItemKeyValueInterface;
use Qikecai\Sffrender\data\linkage\LinkageOptionInterface;
use Qikecai\Sffrender\data\option\OptionInterface;
use Qikecai\Sffrender\data\spreadsheet\SpreadsheetHeaderInterface;
use Qikecai\Sffrender\data\tree\TreeInterface;

class FormDataFacade
{
    /* 接口列表 */
    const COMPONENTS = [
        AssociateNameInterface::class,
        AssociateSearchConfigInterface::class,
        EditorConfigInterface::class,
        FileCrawlConfigInterface::class,
        FileCropperConfigInterface::class,
        FileSearchConfigInterface::class,
        FileUploadConfigInterface::class,
        ItemAttributeInterface::class,
        ItemKeyValueInterface::class,
        LinkageOptionInterface::class,
        OptionInterface::class,
        SpreadsheetHeaderInterface::class,
        TableContentInterface::class,
        TextContentInterface::class,
        TreeInterface::class,
        ViewContentInterface::class,
    ];

    /**
     * 获取数据接口
     */
    public static function getDataInterface() {
        $return = [];
        foreach (self::COMPONENTS as $component) {
            $interface_name = get_class_methods($component);
            $return = array_merge($return, $interface_name);
        }

        return $return;
    }
}
