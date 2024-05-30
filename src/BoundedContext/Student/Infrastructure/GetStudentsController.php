<?php

// declare(strict_types=1);

namespace Src\BoundedContext\Student\Infrastructure;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Student\Application\GetStudentsUseCase;
use Src\BoundedContext\Student\Infrastructure\Repositories\EloquentStudentRepository;

class GetStudentsController extends Controller
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
