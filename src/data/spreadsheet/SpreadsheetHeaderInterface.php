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
     * @param array $field
     * @param array $value
     * @param array $model
     * @return string[]
     */
    public function getSpreadsheetHeader(array $field, ?array $value, ?array $model): array;
}
