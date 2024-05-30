<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Domain;

use Src\BoundedContext\Student\Domain\ValueObjects\StudentEmail;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentName;

final class Student
{
    private $name;
    private $email;

    public function __construct(StudentName $name, StudentEmail $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function name(): StudentName
    {
        return $this->name;
    }

    public function email(): StudentEmail
    {
        return $this->email;
    }

    public static function create(
        StudentName $name,
        StudentEmail $email
    ): Student {
        $student = new self($name, $email);
        return $student;
    }
}
