<?php

namespace App\Shared\Presentation\OpenApi\Attribute;

use OpenSolid\OpenApiBundle\Attribute\Path;
use OpenSolid\OpenApiBundle\Attribute\PathDefaults;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::TARGET_PROPERTY | \Attribute::TARGET_PARAMETER | \Attribute::IS_REPEATABLE)]
class Id extends Path
{
    public static function defaults(): PathDefaults
    {
        return PathDefaults::create()
            ->format('uuid')
            ->example('f81d4fae-7dec-11d0-a765-00a0c91e6bf9')
        ;
    }
}
