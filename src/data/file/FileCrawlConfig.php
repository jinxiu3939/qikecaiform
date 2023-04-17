<?php

namespace Qikecai\Sffrender\data\file;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 文件抓取配置实体
 */
class FileCrawlConfig extends BaseBean
{
    public array $additionalParameter; // 保存额外参数
    public string $api; // 保存接口
    public array $headers; // 保存接口请求头
}
