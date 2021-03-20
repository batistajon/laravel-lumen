<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        return $this->course->paginate(10);
    }

    public function show($id)
    {
        return $this->course->findOrFail($id);
    }

    public function store(Request $request)
    {
        $this->course->create($request->all());

        return response()
                ->json([
                    'data' => [
                        'message' => 'Curso criado com sucesso!'
                        ]
                    ]);
    }

    public function update($id, Request $request)
    {
        $course = $this->course->findOrFail($id);

        $course->update($request->all());

        return response()
                ->json([
                    'data' => [
                        'message' => 'Curso atualizado com sucesso!'
                        ]
                    ]);
    }

    public function destroy($id)
    {
        $course = $this->course->findOrFail($id);

        $course->delete();

        return response()
                ->json([
                    'data' => [
                        'message' => 'Curso removido com sucesso!'
                        ]
                    ]);
    }
}