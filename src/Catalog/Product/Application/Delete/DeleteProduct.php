<?php

namespace App\Catalog\Product\Application\Delete;

use OpenSolid\Cqs\Command\Command;

/**
 * @template-implements Command<void>
 */
readonly class DeleteProduct implements Command
{
    public function __construct(public string $id)
    {
    }
}
