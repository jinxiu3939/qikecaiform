<?php
/**
 * 文件上传配置实体
 */

namespace Qikecai\Sffrender\data\file;

use Qikecai\Sffrender\bean\BaseBean;

class FileUploadConfig extends BaseBean
{
    public $additionalParameter; // 额外参数
    public $allowedFileType; // 允许上传的文件类型
    public $authToken; // 权限值
    public $authTokenHeader; // 权限头名称
    public $itemAlias; // 表单项名称
    public $maxFileSize; // 文件最大尺寸
    public $method;
    public $url; // 上传地址
    public $queueLimit; // 最大上传数
}
