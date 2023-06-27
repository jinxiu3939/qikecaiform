<?php

namespace Qikecai\Sffrender\data\spreadsheet;

/**
 * 电子表格头接口
 */
interface SpreadsheetHeaderInterface
{
    /**
     * 电子表格头
     *
     * @param array $field 字段配置
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return string[]
     */
    public function getSpreadsheetHeader(array $field, mixed $value, ?array $context): array;
}
