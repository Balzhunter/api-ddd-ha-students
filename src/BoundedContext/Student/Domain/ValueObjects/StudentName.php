<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Domain\ValueObjects;

final class StudentName
{
    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }

    public function value(): string
    {
        return $this->value;
    }
}
