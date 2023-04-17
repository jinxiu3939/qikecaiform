<?php

namespace Qikecai\Sffrender\data\file;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 文件裁剪配置实体
 */
class FileCropperConfig extends BaseBean
{
    public array $additionalParameter; // 保存额外参数
    public int $maxFileSize; // 最大尺寸
    public array $headers; // 保存接口请求头
    public string $url; // 保存接口
}
