<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Infrastructure;

use Src\BoundedContext\Student\Application\GetStudentsUseCase;
use Src\BoundedContext\Student\Infrastructure\Repositories\EloquentStudentRepository;

final class GetStudentsController
{
    private $repository;

    public function __construct(EloquentStudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $getStudentsUseCase = new GetStudentsUseCase($this->repository);
        $students = $getStudentsUseCase->__invoke();

        return $students;
    }
}
