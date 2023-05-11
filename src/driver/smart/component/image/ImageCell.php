<?php

namespace Qikecai\Sffrender\driver\smart\component\image;

use Qikecai\Sffrender\driver\smart\component\Component;

/**
 * 图片
 *
 * @author qikecai <xiujixin@163.com>
 */
class ImageCell extends Component
{
    /**
     * 配置列
     * 
     * @param array $attribute
     * @return array
     */
    protected function initColumn(array $attribute): array
    {
        $attribute['sort'] = false; // 不能排序
        $attribute['filter'] = false; // 不能检索
        return $attribute;
    }
}
