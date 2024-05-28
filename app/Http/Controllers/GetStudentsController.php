<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class GetStudentsController extends Controller
{
    /**
     * @var \Src\BoundedContext\Student\Infrastructure\GetStudentsController
     */
    private $getStudentsController;

    public function __construct(\Src\BoundedContext\Student\Infrastructure\GetStudentsController $getStudentsController)
    {
        $this->getStudentsController = $getStudentsController;
    }
    public function __invoke(Request $request)
    {
        $newStudent = new StudentResource($this->getStudentsController->__invoke($request));

        return response($newStudent, 201);
    }
}
