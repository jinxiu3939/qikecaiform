<?php
/**
 * 子项目列表
 * 配置项：
 *  attributes：string, 字段列表配置键
 * User: SZLD-PC-109
 * Date: 2020/7/2
 * Time: 11:36
 */

namespace Qikecai\Sffrender\driver\food\component\itemlist;

use Qikecai\Sffrender\driver\food\component\Component;

class ItemList extends Component
{
    protected $dataNames = [
        'attributes', // 字段属性配置
        'size', // 子项目弹框大小
    ];
}
