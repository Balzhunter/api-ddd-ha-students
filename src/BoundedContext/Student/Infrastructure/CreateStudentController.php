<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Infrastructure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'email' => 'required|unique:students'
            ]);
            if ($validator->fails()) {
                $data = [
                    'errors' => $validator->errors(),
                ];
                return response()->json($data, 404);
            }
            $studentName = $request->input('name');
            $studentEmail = $request->input('email');

            $createStudentUseCase = new CreateStudentUseCase($this->repository);
            $createStudentUseCase->__invoke(
                $studentName,
                $studentEmail,
            );

            return response()->json([], 200);
        } catch (Throwable $e) {
            $data = [
                'errors' => $e->getMessage()
            ];
            return response()->json($data);
        }
    }
}
