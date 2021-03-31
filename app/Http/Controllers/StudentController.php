<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::with('teacher')->get();
        return view('frontend.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['teachers'] = Teacher::select('teacher_id', 'name')->orderBy('name')->get();
        return view('frontend.student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'teacher_id' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $student = new Student();
            $student->name = $input['name'];
            $student->age = $input['age'];
            $student->gender = $input['gender'];
            $student->teacher_id = $input['teacher_id'];
            $student->save();
            DB::commit();

            return redirect()->route('students')->with(['message' => 'Created successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Unable to create new student.", [$e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['student'] = Student::find($id);
        $data['teachers'] = Teacher::select('teacher_id', 'name')->orderBy('name')->get();
        return view('frontend.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'teacher_id' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $student = Student::find($id);
            $student->name = $input['name'];
            $student->age = $input['age'];
            $student->gender = $input['gender'];
            $student->teacher_id = $input['teacher_id'];
            $student->save();
            DB::commit();

            return redirect()->route('students')->with(['message' => 'Edited successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Unable to edit new student.", [$e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::destroy($id);
        return redirect()->route('students')->with(['message' => 'Deleted successfully!']);
    }
}
