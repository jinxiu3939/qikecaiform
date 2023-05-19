<?php

namespace Qikecai\Sffrender\data\tree;

/**
 * 树接口
 */
interface TreeInterface
{
    /**
     * 获取树
     *
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $context 表单上下文
     * @return mixed
     */
    public function getTree(array$field, ?array $value, ?array $context);
}
