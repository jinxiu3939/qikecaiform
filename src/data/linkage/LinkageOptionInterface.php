<?php
/**
 * 联动项接口
 */

namespace Qikecai\Sffrender\data\linkage;


interface LinkageOptionInterface
{
    /**
     * 获取联动数据
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型值
     * @return LinkageBean
     */
    public function getLinkageOption($field, $value, $model);
}
