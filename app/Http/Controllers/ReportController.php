<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\Date;
use App\Models\Report;
use App\Models\Solution;
use App\Models\Solver;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $rules_report = array(
        'backlog_id' => 'required|integer|gt:0',
        'report_code' => 'required|min:3',
        'state' => 'required|in:por asignar,en proceso,en calidad,cerrado',
        'type' => 'required|in:incidencia,soporte',
        'observation' => 'min:5|nullable',
        'report_date' => 'required|date'
    );

    private $data_report = array('backlog_id', 'report_code', 'state', 'type', 'observation', 'report_date');

    private $rules_base = array(
        'system_process' => 'required|min:3',
        'module' => 'required|min:3',
        'problem_description' => 'required|min:5',
        'affected_service' => 'required|min:3',
        'severity' => 'required|in:bajo,medio,alto',
        'client_impact' => 'required|in:bajo,medio,alto',
        'ambience' => 'required|min:3',
        'report_medium' => 'required|in:correo,telefono',
        'client_name' => 'required|min:3',
        'expected_solution_time' => 'required|min:3'
    );

    private $data_base = array('system_process', 'module', 'problem_description', 'affected_service', 'severity', 'client_impact', 'ambience', 'report_medium', 'client_name', 'expected_solution_time');

    private $rules_solution = array(
        'consequences' => 'required|min:3',
        'used_solution' => 'required|min:3'
    );

    private $data_solution = array('consequences', 'used_solution');

    private $rules_solver = array(
        'user_id' => 'required|integer|gt:0'
    );

    private $data_solver = array('user_id');

    private $rules_date = array(
        'estimated_begin' => 'required|date|after:report_date',
        'estimated_end' => 'required|date|after:estimated_begin',
        'reconsider_begin' => 'date|nullable',
        'reconsider_end' => 'date|after:reconsider_begin|nullable',
        'real_begin' => 'date|nullable',
        'real_end' => 'date|after:real_begin|nullable',
    );

    private $data_date = array('estimated_begin', 'estimated_end', 'reconsider_begin', 'reconsider_end', 'real_begin', 'real_end');

    public function index()
    {
        return Report::with(['base', 'solution', 'solver', 'date'])->get();
    }

    public function show($report_id)
    {
        $validated = Validator::make(array('id' => $report_id), [
            'id' => 'required|integer|gt:0'
        ]);

        if ($validated->fails()) {
            return response()->json(array(
                'errors' => $validated->messages()
            ), 400);
        }


        return Report::where('report_id', '=', $report_id)->with(['base', 'solution', 'solver', 'date'])->firstOrFail();
    }

    public function store(Request $request)
    {
        $rules = array_merge($this->rules_report, $this->rules_base, $this->rules_solution, $this->rules_solver, $this->rules_date);

        $validated = Validator::make($request->all(), $rules);

        if ($validated->fails()) {
            return response()->json(array(
                'errors' => $validated->messages()
            ), 400);
        }

        $data_report = $request->only($this->data_report);
        $data_base = $request->only($this->data_base);
        $data_solution = $request->only($this->data_solution);
        $data_solver = $request->only($this->data_solver);
        $data_date = $request->only($this->data_date);

        $report = Report::create($data_report);

        $data_base = array_merge(array('report_id' => $report['report_id']), $data_base);
        $data_solution = array_merge(array('report_id' => $report['report_id']), $data_solution);
        $data_solver = array_merge(array('report_id' => $report['report_id']), $data_solver);
        $data_date = array_merge(array('report_id' => $report['report_id']), $data_date);


        Base::create($data_base);
        Solution::create($data_solution);
        Solver::create($data_solver);
        Date::create($data_date);

        $response = Report::where('report_id', '=', $report['report_id'])->with(['base', 'solution', 'solver', 'date'])->firstOrFail();

        return response()->json($response, 201);
    }

    public function update(Request $request, $report_id)
    {
        $rules = array_merge(array('id' => 'required|integer|gt:0'), $this->rules_report, $this->rules_base, $this->rules_solution, $this->rules_solver, $this->rules_date);

        $validated = Validator::make(array_merge(array('id' => $report_id), $request->all()), $rules);

        if ($validated->fails()) {
            return response()->json(array(
                'errors' => $validated->messages()
            ), 400);
        }

        $data_report = $request->only($this->data_report);
        $data_base = $request->only($this->data_base);
        $data_solution = $request->only($this->data_solution);
        $data_solver = $request->only($this->data_solver);
        $data_date = $request->only($this->data_date);

        Report::where('report_id', '=', $report_id)->update($data_report);
        Base::where('report_id', '=', $report_id)->update($data_base);
        Solution::where('report_id', '=', $report_id)->update($data_solution);
        Solver::where('report_id', '=', $report_id)->update($data_solver);
        Date::where('report_id', '=', $report_id)->update($data_date);

        return Report::where('report_id', '=', $report_id)->with(['base', 'solution', 'solver', 'date'])->firstOrFail();
    }

    public function close($report_id)
    {
        $validated = Validator::make(array('id' => $report_id), array('id' => 'required|integer|gt:0'));

        if ($validated->fails()) {
            return response()->json(array(
                'errors' => $validated->messages()
            ), 400);
        }

        Report::findOrFail($report_id)->update(['state' => 'cerrado']);

        return Report::where('report_id', '=', $report_id)->with(['base', 'solution', 'solver', 'date'])->firstOrFail();
    }
}
