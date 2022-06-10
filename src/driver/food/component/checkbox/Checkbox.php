<?php
/**
 * 多选项组件
 */

namespace Qikecai\Sffrender\driver\food\component\checkbox;

use Qikecai\Sffrender\driver\food\component\radio\Radio;

class Checkbox extends Radio
{
    protected $attributeNames = [
        'clear', // 是否清除无效的值
        'width', // 选项宽度
    ];

    protected $dataNames = [
        'options', // 选项
    ];

    /**
     * 转换值为文本
     * @param $value mixed 值
     * @return string
     */
    protected function transformValueToText($value) {
        $texts = [];
        if (is_array($value)) { // 多选址
            foreach ($value as $v) {
                array_push($texts, $this->fetchOptionText($v)); // 从options中获取文本
            }
            $texts = implode(',', $texts);
        } else {
            $texts = parent::transformValueToText($value); // 从options中获取文本;
        }
        return $texts;
    }
}
