<?php

namespace Qikecai\Sffrender;

/**
 * 组件接口
 *
 * @author qikecai <xiujixin@163.com>
 */
interface ComponentInterface
{
    /**
     * 配置表单组件
     * 组件赋值
     *
     * @param array $field 字段信息
     * @param array $data 数据值
     * @return array
     */
    public function init(array $field = [], array $data = []): array;
}
