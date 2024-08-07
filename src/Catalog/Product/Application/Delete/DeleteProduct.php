<?php

namespace App\Catalog\Product\Application\Delete;

use OpenSolid\Cqs\Command\Command;

/**
 * @extends Command<void>
 */
readonly class DeleteProduct extends Command
{
    public function __construct(
        public string $id,
    ) {
    }
}
