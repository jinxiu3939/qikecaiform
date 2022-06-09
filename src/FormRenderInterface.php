<?php
/**
 * 表单渲染接口
 */

namespace Qikecai\Sffrender;

interface FormRenderInterface
{
    /**
     * 渲染表单
     * @param $group_field array 分组之后的字段
     * @param $data array 数据
     * @param $form array 表单信息
     * @return mixed
     */
    public function render($form, $group_field, $data);
}
