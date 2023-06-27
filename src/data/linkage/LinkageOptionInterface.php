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
     * @param mixed $value 字段值
     * @param array $context 表单上下文
     * @return LinkageBean
     */
    public function getLinkageOption(array $field, mixed $value, ?array $context): LinkageBean;
}
