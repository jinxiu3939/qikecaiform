<?php

namespace Qikecai\Sffrender\data\linkage;

/**
 * 联动项接口
 */
interface LinkageOptionInterface
{
    /**
     * 获取联动数据
     * 
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型值
     * @return LinkageBean
     */
    public function getLinkageOption(array $field, ?array $value, ?array $model): LinkageBean;
}
