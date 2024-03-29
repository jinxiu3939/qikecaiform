<?php
/**
 * 多选树组件
 */

namespace Qikecai\Sffrender\driver\food\component\checkboxtree;

use Qikecai\Sffrender\driver\food\component\Component;

class CheckboxTree extends Component
{
    protected $attributeNames = [
        'readonly', // 是否只读
    ];

    protected $dataNames = [
        'tree', // 树结构
    ];
}
