<?php
/**
 * 附件
 * 属性配置因字段而异，数据配置为通用配置
 */

namespace Qikecai\Sffrender\driver\food\component\attachment;

use Qikecai\Sffrender\driver\food\component\Component;

class Attachment extends Component
{
    protected $attributeNames = [
        'debug', // 是否开启调试模式
        'drag', // 是否可拖动排序
        'multiple', // 是否支持多文件上传
        'queueLimit', // 单次操作最大文件数目
        'maxUploadFileSize', // 上传文件最大尺寸
        'allowedFileType'
    ];

    protected $dataNames = [
        'searchConfig', // 检索配置
        'uploadConfig', // 上传配置
    ];
}
