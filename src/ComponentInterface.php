<?php
/**
 * 组件接口
 */

namespace Qikecai\Sffrender;


interface ComponentInterface
{
    const VIEW_FORMAT_NAME = 'viewTextFormat'; // 预览格式化标识

    /**
     * 配置表单组件
     * 组件赋值
     * @param $field array 字段信息
     * @param $data array 数据值
     * @return array
     */
    public function init($field = [], $data = []);

    /**
     * 预览组件内容
     * @param $field array 字段信息
     * @param $data array 数据值
     * @return array
     */
    public function view($field = [], $data = []);
}
