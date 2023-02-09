<?php
/**
 * 文件裁剪配置实体
 */

namespace Qikecai\Sffrender\data\file;


use Qikecai\Sffrender\bean\BaseBean;

class FileCropperConfig extends BaseBean
{
    public $additionalParameter; // 保存额外参数
    public $headers; // 保存接口请求头
    public $url; // 保存接口
}
