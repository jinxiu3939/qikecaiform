<?php
/**
 * 文件抓取配置实体
 */

namespace Qikecai\Sffrender\data\file;


use Qikecai\Sffrender\bean\BaseBean;

class FileCrawlConfig extends BaseBean
{
    public $additionalParameter; // 保存额外参数
    public $api; // 保存接口
    public $headers; // 保存接口请求头
}
