<?php
/**
 * 联动框
 * 配置项：
 *  tree：string, 表单内容`options`中的键，用于获取字段可选树
 *  root：string，根选项的父元素值，用于获取根选项
 */

namespace Qikecai\Sffrender\driver\food\component\linkagebox;

use Qikecai\Sffrender\driver\food\component\Component;

class LinkageBox extends Component
{
    protected $attributeNames = [
        'readonly', // 是否只读，boolean
        'root', // 根选项的父元素值，用于获取根选项
    ];

    protected $dataNames = [
        'tree', // 联动树
    ];
}
