<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class CreateStudentController extends Controller
{
    /**
     * @var \Src\BoundedContext\Student\Infrastructure\CreateStudentInfra
     */
    private $createStudentController;

    public function __construct(\Src\BoundedContext\Student\Infrastructure\CreateStudentInfra $createStudentInfra)
    {
        $this->createStudentController = $createStudentInfra;
    }
    public function __invoke(Request $request)
    {
        $newStudent = new StudentResource($this->createStudentController->__invoke($request));

        return response($newStudent, 201);
    }
}
