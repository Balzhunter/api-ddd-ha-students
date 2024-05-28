<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\Student\Application\CreateStudentUseCase;
use Src\BoundedContext\Student\Infrastructure\Repositories\EloquentStudentRepository;

final class CreateStudentInfra
{
    private $repository;

    public function __construct(EloquentStudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $studentName = $request->input('name');
        $studentEmail = $request->input('email');

        $createStudentUseCase = new CreateStudentUseCase($this->repository);
        $createStudentUseCase->__invoke(
            $studentName,
            $studentEmail,
        );
    }
}