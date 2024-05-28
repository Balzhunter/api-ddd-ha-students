<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Infrastructure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\Student\Application\CreateStudentUseCase;
use Src\BoundedContext\Student\Infrastructure\Repositories\EloquentStudentRepository;
use Throwable;

class CreateStudentController extends Controller
{
    private $repository;

    public function __construct(EloquentStudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        try {
            $studentName = $request->input('name');
            $studentEmail = $request->input('email');

            $createStudentUseCase = new CreateStudentUseCase($this->repository);
            $student = $createStudentUseCase->__invoke(
                $studentName,
                $studentEmail,
            );

            return $student;
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
}
