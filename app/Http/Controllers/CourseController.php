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
    
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        return response()->json($this->course->get());
    }
    
    /**
     * Method show
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
    public function show($id)
    {
        return response()->json([$this->course->findOrFail($id)]);
    }
    
    /**
     * Method store
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
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
    
    /**
     * Method update
     *
     * @param $id $id [explicite description]
     * @param Request $request [explicite description]
     *
     * @return void
     */
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
    
    /**
     * Method destroy
     *
     * @param $id $id [explicite description]
     *
     * @return void
     */
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