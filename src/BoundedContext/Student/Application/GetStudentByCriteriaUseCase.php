<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Application;

use Src\BoundedContext\Student\Domain\Contracts\StudentRepositoryContract;
use Src\BoundedContext\Student\Domain\Student;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentEmail;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentName;

final class GetStudentByCriteriaUseCase
{
    private $repository;

    public function __construct(StudentRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $studentName, string $studentEmail): ?Student
    {
        $name = new StudentName($studentName);
        $email = new StudentEmail($studentEmail);
        $student = $this->repository->findByCriteria($name, $email);
        return $student;
    }
}
