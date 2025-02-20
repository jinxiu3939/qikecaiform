<?php
/**
 * 子项目列表
 * 配置项：
 *  attributes：string, 字段列表配置键
 */

namespace Qikecai\Sffrender\driver\food\component\itemlist;

use Qikecai\Sffrender\driver\food\component\Component;

class ItemList extends Component
{
    protected $attributeNames = [
        'height', // 列表大小 'small' | 'medium' | 'large'
        'kind', // 弹出框类型 'item' | 'key-value'
        'size', // 子项目弹框大小 'medium' | 'large'
    ]; // 字段配置项名称

    protected $dataNames = [
        'attributes', // 字段属性配置
        'keyValue', // 键值对配置
    ];
}
