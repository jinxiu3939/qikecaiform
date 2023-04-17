<?php

namespace Qikecai\Sffrender\data\file;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 文件上传配置实体
 */
class FileUploadConfig extends BaseBean
{
    public array $additionalParameter; // 额外参数
    public array $allowedFileType; // 允许上传的文件类型
    public array $authToken; // 权限值
    public array $authTokenHeader; // 权限头名称
    public array $itemAlias; // 表单项名称
    public int $maxFileSize; // 文件最大尺寸
    public array $method;
    public string $url; // 上传地址
}
