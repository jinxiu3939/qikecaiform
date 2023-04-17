<?php

namespace Qikecai\Sffrender\data\option;

/**
 * 表单选项接口
 * 用于获取可选项集合
 */
interface OptionInterface
{
    /**
     * 获取选项集合
     * 
     * @param array $field 字段配置
     * @param array $value 字段值
     * @param array $model 模型值
     * @return array <OptionBean | string>[]
     */
    public function getOption(array $field, ?array $value, ?array $model): array;
}
