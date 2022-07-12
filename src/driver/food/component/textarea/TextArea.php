<?php
/**
 * 文本域
 */

namespace Qikecai\Sffrender\driver\food\component\textarea;

use Qikecai\Sffrender\driver\food\component\Component;

class TextArea extends Component
{
    protected $attributeNames = [
        'rows', // 高度
    ];

    /**
     * 转换换行符
     * @param $value string 值
     * @return string
     */
    protected function transformValueToText($value) {
        return str_replace(["\r\n", "\n",], "<br/>", $value);
    }
}
