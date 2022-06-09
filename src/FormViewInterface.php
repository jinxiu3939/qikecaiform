<?php
/**
 * 表单预览接口
 */
namespace Qikecai\Sffrender;

interface FormViewInterface
{
    /**
     * 预览表单
     * @param $group_fields array 分组的字段
     * @param $data array 数据
     * @param $form array 表单信息
     * @return mixed
     */
    public function view($form, $group_fields, $data);
}
