<?php
/**
 * 文件检索配置实体
 */

namespace Qikecai\Sffrender\data\file;


use Qikecai\Sffrender\bean\BaseBean;

class FileSearchConfig extends BaseBean
{
    public $additionalParameter; // 检索条件
    public $api; // 检索接口
    public $display; // 显示方式
    public $headers; // 请求头
    public $mode; // 检索方式
    public $queueLimit; // 可选择最大数目
    public $result; // 默认结果集，类型为文件数组，Qikecai\Sffrender\data\file\FileBean[]
}
