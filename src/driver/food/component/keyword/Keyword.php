<?php
/**
 * 关键字
 */

namespace Qikecai\Sffrender\driver\food\component\keyword;

use Qikecai\Sffrender\driver\food\component\Component;

class Keyword extends Component
{
    protected $attributeNames = [
        'readonly', // 是否只读
    ];

    protected $dataNames = [
        'options', // 选项
    ];
}
