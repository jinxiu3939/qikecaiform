<?php
/**
 * 电子表格
 */

namespace Qikecai\Sffrender\driver\food\component\spreadsheet;


use Qikecai\Sffrender\driver\food\component\Component;

class Spreadsheet extends Component
{
    protected $attributeNames = [
        'view', // 是否预览
    ];

    protected $dataNames = [
        'uploadConfig', // 上传配置
        'header', // 表格头
    ];
}
