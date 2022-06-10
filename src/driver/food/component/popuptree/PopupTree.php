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

    /**
     * 转换值为文本
     * @param $value string 值
     * @return string
     */
    protected function transformValueToText($value) {
        $data = $this->parseData();
        return isset($data['text']) && $data['text'] ? $data['text'] : $value; // 从data中获取文本
    }
}
