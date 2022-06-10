<?php
/**
 * 关联检索配置实体
 */

namespace Qikecai\Sffrender\data\associate;

use Qikecai\Sffrender\bean\BaseBean;

class AssociateSearchConfigBean extends BaseBean
{
    public $additionalParameter; // 异步检索条件
    public $conditions; // 检索条件，类型为弹出式表单组件数组 PopupFormComponentBean[]
    public $mode; // 检索方式 'async' | 'sync'
    public $result; // 检索结果
    public $size; // 分页大小
    public $endpoint; // 检索地址
}
