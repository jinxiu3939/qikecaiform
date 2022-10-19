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
     * 转换值为文本
     * @param $value string 值
     * @return string
     */
    protected function transformValueToText($value) {
        return nl2br(strip_tags($value)); // 过滤标签并增加换行符
    }
}
