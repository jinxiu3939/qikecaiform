<?php
/**
 * 文件实体
 */

namespace Qikecai\Sffrender\data\file;


use Qikecai\Sffrender\bean\BaseBean;

class FileBean extends BaseBean
{
    public $id; // 编号
    public $fileName; // 文件名称
    public $url; // 访问地址
    public $creationTime; // 创建时间
    public $userId; // 所有人编号
    public $clientId; // 客户端编号
    public $type; // 类型
    public $storage; // 存储方式
    public $title; // 描述
    public $local; // 本地存储时的存储路径
}
