<?php
/**
 * 范围文本框
 */

namespace Qikecai\Sffrender\driver\food\component\textrange;

use Qikecai\Sffrender\driver\food\component\Component;

class TextRange extends Component
{
    protected $attributeNames = [
        'kind', // 文本框类型
    ]; // 字段配置项名称

    protected $dataNames = [
        'placeholder', // 提示，{start: string, end: string}
    ];
}
