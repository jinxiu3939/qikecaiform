<?php

namespace Qikecai\Sffrender\driver\smart\component\boolean;

use Qikecai\Sffrender\driver\smart\component\Component;
use Qikecai\Sffrender\driver\smart\config\SmartConfig;

/**
 * 是否单元格
 */
class BooleanCell extends Component
{
    /**
     * 配置列
     * 
     * @param array $attribute
     * @return array
     */
    protected function initColumn(array $attribute): array
    {
        $attribute['filterFunction'] = SmartConfig::COLUMN_FILTER_FUNCTION_BOOLEAN;
        return $attribute;
    }
}
