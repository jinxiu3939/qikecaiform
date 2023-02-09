<?php
/**
 * 文件裁剪配置实体
 */

namespace Qikecai\Sffrender\data\file;


use Qikecai\Sffrender\bean\BaseBean;

class FileCropperConfig extends BaseBean
{
    public $additionalParameter; // 保存额外参数
    public $aspectRatio; // 裁剪比率, {width: number, height: number}
    public $cropperType; // 裁剪格式，'png'|'jpeg'
    public $headers; // 保存接口请求头
    public $queueLimit; // 可保存最大数目
    public $url; // 保存接口
}
