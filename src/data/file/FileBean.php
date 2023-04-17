<?php

namespace Qikecai\Sffrender\data\file;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 文件实体
 */
class FileBean extends BaseBean
{
    public int $id; // 编号
    public string $fileName; // 文件名称
    public string $url; // 访问地址
    public string $createTime; // 创建时间
    public string $type; // 类型
    public string $title; // 描述
    public array $tag; // 标签
}
