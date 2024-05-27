<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Domain\Contracts;

use Src\BoundedContext\Student\Domain\Student;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentEmail;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentId;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentName;

interface StudentRepositoryContract
{
    public function find(StudentId $studentId): ?Student;

    public function findByCriteria(StudentName $studentName, StudentEmail $studentEmail): ?Student;

    public function save(Student $student): void;

    public function update(StudentId $studentId, Student $student): void;

    public function delete(StudentId $studentId): void;
}
