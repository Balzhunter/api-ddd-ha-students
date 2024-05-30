<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Domain\ValueObjects;

use InvalidArgumentException;

final class StudentEmail
{
    private $value;

    public function __construct(string $email)
    {
        $this->validate($email);
        $this->value = $email;
    }

    private function validate(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the invalid email: <%s>.', static::class, $email)
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
