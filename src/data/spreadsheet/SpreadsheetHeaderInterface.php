<?php
/**
 * 电子表格头接口
 */

namespace Qikecai\Sffrender\data\spreadsheet;


interface SpreadsheetHeaderInterface
{
    /**
     * 电子表格头
     * @param array $field
     * @param array $value
     * @param array $model
     * @return string[]
     */
    public function getSpreadsheetHeader($field, $value, $model);
}
