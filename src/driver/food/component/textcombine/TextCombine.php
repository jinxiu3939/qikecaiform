<?php
/**
 * 组合文本框
 * 配置项：
 *  attributes：string, 字段配置键
 */

namespace Qikecai\Sffrender\driver\food\component\textcombine;

use Qikecai\Sffrender\driver\food\component\Component;

class TextCombine extends Component
{
    protected $attributeNames = [
        'kind', // 文本框类型
        'readonly', // 是否只读
    ]; // 字段配置项名称

    protected $dataNames = [
        'attributes', // 字段属性配置
    ];
}
