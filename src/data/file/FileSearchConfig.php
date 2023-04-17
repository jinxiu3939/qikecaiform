<?php

namespace Qikecai\Sffrender\data\file;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 文件检索配置实体
 */
class FileSearchConfig extends BaseBean
{
    public array $additionalParameter; // 检索条件
    public string $api; // 检索接口
    public string $display; // 显示方式
    public array $headers; // 请求头
    public string $mode; // 检索方式
    public array $result; // 默认结果集，类型为文件数组，Qikecai\Sffrender\data\file\FileBean[]
}
