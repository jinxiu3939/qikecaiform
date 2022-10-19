<?php
/**
 * 弹出式树
 */

namespace Qikecai\Sffrender\driver\food\component\popuptree;

use Qikecai\Sffrender\driver\food\component\Component;

class PopupTree extends Component
{
    protected $attributeNames = [
        'mode', // 加载方式，'async' | 'sync'
        'endpoint', // 数据接口
        'size' // 尺寸
    ];

    protected $dataNames = [
        'searchParameter', // 检索条件 [todo]
        'tree', // 树结构
        'text', // 关联内容显示文本
    ];
}
