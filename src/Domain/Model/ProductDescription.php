<?php

namespace App\Domain\Model;

use Ddd\Domain\ValueObject\String\NonEmptyString;

class ProductDescription extends NonEmptyString
{
    protected const MIN_LENGTH = 10;
    protected const EMPTY_ERROR_MESSAGE = 'Product description cannot be empty.';
    protected const MIN_LENGTH_ERROR_MESSAGE = 'Product description cannot be shorter than %d characters.';
    protected const MAX_LENGTH_ERROR_MESSAGE = 'Product description cannot be longer than %d characters.';
}