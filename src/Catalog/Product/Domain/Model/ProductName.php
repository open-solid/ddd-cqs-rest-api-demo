<?php

namespace App\Catalog\Product\Domain\Model;

use OpenSolid\Domain\Model\String\NonEmptyString;

class ProductName extends NonEmptyString
{
    protected const MIN_LENGTH = 3;
    protected const MAX_LENGTH = 200;
    protected const EMPTY_ERROR_MESSAGE = 'Product name cannot be empty.';
    protected const MIN_LENGTH_ERROR_MESSAGE = 'Product name cannot be shorter than %d characters.';
    protected const MAX_LENGTH_ERROR_MESSAGE = 'Product name cannot be longer than %d characters.';
}
