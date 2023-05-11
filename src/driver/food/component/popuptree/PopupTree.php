<?php
/**
 * 弹出式树
 */

namespace Qikecai\Sffrender\driver\food\component\popuptree;

use Qikecai\Sffrender\driver\food\component\Component;

class PopupTree extends Component
{
    protected $attributeNames = [
        'filter', // 是否检索
        'readonly', // 是否只读
        'size' // 尺寸
    ];

    protected $dataNames = [
        'searchConfig', // 检索配置
        'text', // 关联内容显示文本
        'tree', // 树结构
    ];
}
