<?php

namespace App\Shared\Presentation\OpenApi\Attribute;

use Yceruto\OpenApiBundle\Attribute\Path;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER | \Attribute::IS_REPEATABLE)]
class Id extends Path
{
    public $_format = 'uuid';
    public $_example = 'f81d4fae-7dec-11d0-a765-00a0c91e6bf9';
}
