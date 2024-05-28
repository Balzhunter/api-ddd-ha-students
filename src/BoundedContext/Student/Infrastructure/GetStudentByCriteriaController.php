<?php

namespace Src\BoundedContext\Student\Infrastructure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\BoundedContext\Student\Application\GetStudentByCriteriaUseCase;
use Src\BoundedContext\Student\Infrastructure\Repositories\EloquentStudentRepository;
use Throwable;

class GetStudentByCriteriaController extends Controller
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
                'email' => 'required'
            ]);
            if ($validator->fails()) {
                $data = [
                    'errors' => $validator->errors(),
                ];
                return response()->json($data, 400);
            }
            $studentName = $request->input('name');
            $studentEmail = $request->input('email');

            $studentByCriteriaUseCase = new GetStudentByCriteriaUseCase($this->repository);
            $studentByCriteria = $studentByCriteriaUseCase->__invoke(
                $studentName,
                $studentEmail,
            );

            if (!$studentByCriteria) {
                $data = [
                    'message' => 'Student not found',
                ];
                return response()->json($data, 404);
            }

            $data = [
                'student' => [
                    'name' => $studentByCriteria->name()->value(),
                    'email' => $studentByCriteria->email()->value()
                ]
            ];
            return response()->json($data, 200);
        } catch (Throwable $e) {
            $data = [
                'errors' => $e->getMessage()
            ];
            return response()->json($data, 500);
        }
    }
}
