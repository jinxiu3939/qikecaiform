<?php

namespace Qikecai\Sffrender\data\associate;

use Qikecai\Sffrender\bean\BaseBean;

/**
 * 关联检索配置实体
 */
class AssociateSearchConfigBean extends BaseBean
{
    public array $additionalParameter; // 附加参数
    public array $conditions; // 检索条件
    public string $endpoint; // 检索地址
    public string $mode; // 检索方式 'async'|'sync'
    public string $param; // 异步检索参数
    public array $result; // 同步检索结果
    public $size; // 分页大小
}
