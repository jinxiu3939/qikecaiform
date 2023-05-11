<?php

namespace Qikecai\Sffrender\driver\smart\component\associate;

use Qikecai\Sffrender\driver\smart\component\Component;
use Qikecai\Sffrender\driver\smart\config\SmartConfig;

/**
 * 关联
 */
class AssociateCell extends Component
{
    /**
     * 配置列
     * 
     * @param array $attribute
     * @return array
     */
    protected function initColumn(array $attribute): array
    {
        $attribute['filterFunction'] = SmartConfig::COLUMN_FILTER_FUNCTION_ASSOCIATE;
        return $attribute;
    }
}
