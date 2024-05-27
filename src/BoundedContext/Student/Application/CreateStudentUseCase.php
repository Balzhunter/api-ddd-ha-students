<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Application;

use Src\BoundedContext\Student\Domain\Contracts\StudentRepositoryContract;
use Src\BoundedContext\Student\Domain\Student;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentEmail;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentName;

final class CreateStudentUseCase
{

    private $repository;

    public function __construct(StudentRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $studentName, string $studentEmail): void
    {
        $name = new StudentName($studentName);
        $email = new StudentEmail($studentEmail);

        $student = Student::create($name, $email);

        $this->repository->save($student);
    }
}
