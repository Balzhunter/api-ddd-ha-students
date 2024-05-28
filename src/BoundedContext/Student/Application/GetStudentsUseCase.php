<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Application;

use Src\BoundedContext\Student\Domain\Contracts\StudentRepositoryContract;

final class GetStudentsUseCase
{
    private $repository;

    public function __construct(StudentRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $users = $this->repository->findAll();

        return $users;
    }
}
