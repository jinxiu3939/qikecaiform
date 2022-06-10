<?php
/**
 * 树接口
 */

namespace Qikecai\Sffrender\data\tree;


interface TreeInterface
{
    /**
     * 获取树
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型值
     * @return mixed
     */
    public function getTree($field, $value, $model);
}
