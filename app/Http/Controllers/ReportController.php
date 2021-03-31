<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['reports'] = Report::with('student')->get();
        return view('frontend.report.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['students'] = Student::select('student_id', 'name')->orderBy('name')->get();
        $data['terms'] = ['One', 'Two'];
        return view('frontend.report.create', $data);
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
            'student_id' => 'required',
            'term' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $report = new Report();
            $report->student_id = $input['student_id'];
            $report->term = $input['term'];
            $report->science = $input['science'];
            $report->maths = $input['maths'];
            $report->history = $input['history'];
            $report->total_marks =  $input['science'] + $input['maths'] + $input['history'];
            $report->save();
            DB::commit();

            return redirect()->route('reports')->with(['message' => 'Created successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Unable to create new report.", [$e]);
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
        $data['report'] = Report::with('student')->find($id);
        $data['students'] = Student::select('student_id', 'name')->orderBy('name')->get();
        $data['terms'] = ['One', 'Two'];
        return view('frontend.report.edit', $data);
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
            'student_id' => 'required',
            'term' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $report = Report::find($id);
            $report->student_id = $input['student_id'];
            $report->term = $input['term'];
            $report->science = isset($input['science']) ? $input['science'] : '';
            $report->maths = isset($input['maths']) ? $input['maths'] : '';
            $report->history = isset($input['history']) ? $input['history'] : '';
            $report->total_marks =  $input['science'] + $input['maths'] + $input['history'];
            $report->save();
            DB::commit();

            return redirect()->route('reports')->with(['message' => 'Edited successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Unable to edit report.", [$e]);
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
        $report = Report::destroy($id);
        return redirect()->route('reports')->with(['message' => 'Deleted successfully!']);
    }
}
