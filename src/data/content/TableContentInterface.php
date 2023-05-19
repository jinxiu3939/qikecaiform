<?php

namespace Qikecai\Sffrender\data\content;

/**
 * 表格内容接口
 */
interface TableContentInterface
{
    /**
     * 获取单元格的内容
     *
     * @param mixed $value 字段值
     * @param array $field 字段配置
     * @param array $context 列表行上下文
     * @return mixed
     */
    public function getCellContent(mixed $value, ?array $field, ?array $context);
}
