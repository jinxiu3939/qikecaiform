<?php
/**
 * 表单组合接口
 */

namespace Qikecai\Sffrender;

interface FormComposeInterface
{
    /**
     * 组合表单
     * @param $form array 表单，通过FormRenderInterface接口生成
     * @param $title array 标题
     * @param $config array 配置，保留字段
     * @return mixed
     */
    public function compose($form, $title, $config = []);
}
