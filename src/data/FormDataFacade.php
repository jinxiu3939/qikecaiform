<?php
/**
 * 表单数据门面类
 */

namespace Qikecai\Sffrender\data;

use Qikecai\Sffrender\data\associate\AssociateNameInterface;
use Qikecai\Sffrender\data\associate\AssociateSearchConfigInterface;
use Qikecai\Sffrender\data\editor\EditorConfigInterface;
use Qikecai\Sffrender\data\file\FileCrawlConfigInterface;
use Qikecai\Sffrender\data\file\FileCropperConfigInterface;
use Qikecai\Sffrender\data\file\FileSearchConfigInterface;
use Qikecai\Sffrender\data\file\FileUploadConfigInterface;
use Qikecai\Sffrender\data\items\ItemAttributeInterface;
use Qikecai\Sffrender\data\linkage\LinkageOptionInterface;
use Qikecai\Sffrender\data\option\OptionBean;
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
        LinkageOptionInterface::class,
        OptionInterface::class,
        SpreadsheetHeaderInterface::class,
        TreeInterface::class,
    ];

    /**
     * 获取接口选项
     */
    public static function getInterfaceOption() {
        $return = [];
        foreach (self::COMPONENTS as $component) {
            $interface_name = substr($component, strrpos($component, "\\") + 1, -9);
            $config = new OptionBean(['text' => $interface_name, 'value' => $interface_name]);
            array_push($return, $config);
        }
        return $return;
    }
}
