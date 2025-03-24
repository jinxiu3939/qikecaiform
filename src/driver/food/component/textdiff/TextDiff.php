<?php
/**
 * 比较文本框
 * 配置项：
 *  operations：Option[], 操作符选项
 */

namespace Qikecai\Sffrender\driver\food\component\textdiff;

use Qikecai\Sffrender\driver\food\component\Component;

class TextDiff extends Component
{
    protected $attributeNames = [
        'kind', // 文本框类型
        'placeholder', // 提示
        'position', // 操作符位置
    ]; // 字段配置项名称

    protected $dataNames = [
        'operators', // 操作符
    ];
}
