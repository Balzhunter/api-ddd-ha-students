<?php

declare(strict_types=1);

namespace Src\BoundedContext\Student\Infrastructure\Repositories;

use App\Models\Student as EloquentStudentModel;
use Illuminate\Support\Collection;
use Src\BoundedContext\Student\Domain\Contracts\StudentRepositoryContract;
use Src\BoundedContext\Student\Domain\Student;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentEmail;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentId;
use Src\BoundedContext\Student\Domain\ValueObjects\StudentName;


final class EloquentStudentRepository implements StudentRepositoryContract
{
    private $eloquentStudentModel;

    public function __construct()
    {
        $this->eloquentStudentModel = new EloquentStudentModel;
    }

    public function findAll()
    {
        $students = $this->eloquentStudentModel->all();

        // Return Eloquent Students result
        return $students;
    }

    public function find(studentId $id): ?student
    {
        $student = $this->eloquentStudentModel->findOrFail($id->value());

        // Return Domain student model
        return new Student(
            new StudentName($student->name),
            new StudentEmail($student->email),
        );
    }

    public function findByCriteria(StudentName $name, StudentEmail $email): ?Student
    {
        $student = $this->eloquentStudentModel
            ->where('name', $name->value())
            ->where('email', $email->value())
            ->firstOrFail();

        // Return Domain student model
        return new Student(
            new StudentName($student->name),
            new StudentEmail($student->email),
        );
    }

    public function save(Student $student): void
    {
        $newStudent = $this->eloquentStudentModel;

        $data = [
            'name' => $student->name()->value(),
            'email' => $student->email()->value(),
        ];

        $newStudent->create($data);
    }

    public function update(studentId $id, student $student): void
    {
        $studentToUpdate = $this->eloquentStudentModel;

        $data = [
            'name' => $student->name()->value(),
            'email' => $student->email()->value(),
        ];

        $studentToUpdate
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(studentId $id): void
    {
        $this->eloquentStudentModel
            ->findOrFail($id->value())
            ->delete();
    }
}
