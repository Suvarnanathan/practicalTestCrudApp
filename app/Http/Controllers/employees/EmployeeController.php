<?php

namespace App\Http\Controllers\employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Title;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();// retrieve all employees 
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today=Carbon::now();
        $emp=null;
       return view('employees.create',compact('today','emp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validator = Validator::make(
            $request->all(),
            [
                'fname'                  => 'required|max:14',
                'lname'                       => 'required|max:16',
                'dob'                       => 'required',
                'gender' => 'required',
                'hireDate'=>'required',
                'amount'=>'required',
                'fromdate'=>'required',
                'toDate'=>'required',
                'title'=>'required',
                'titlefromdate'=>'required',
                'titletoDate'=>'required'
            ],
            [
                'fname.required' => 'First Name is Required',
                'lname.required'           => 'Last Name is Required',
                'dob.required'    => 'Date of Birth is Required',
                'hireDate.required' => 'Hire Date is Required',
                'gender.required' => 'Gender is Required',
                'amount.required'    => 'Amount is Required',
                'fromdate.required'    => 'From Date is Required',
                'toDate.required'    => 'To Date  is Required',
                'title.required'    => 'Title is Required',
                'titlefromdate.required'    => 'From Date is Required',
                'titletoDate.required'    => 'To Date is Required',



            ]

        );

        if ($validator->fails()) {
            return redirect('/employees/create')->withErrors($validator)->withInput();
        }
        $employee=new Employee;
        $employee->first_name=$request->fname;
        $employee->last_name=$request->lname;
        $employee->birth_date=$request->dob;
        $employee->hire_date=$request->hireDate;
        $employee->gender=$request->gender;
        $employee->save();
        $salary=new Salary;
        $salary->employee_id=$employee->id;
        $salary->salary=$request->amount;
        $salary->from_date=$request->fromdate;
        $salary->to_date=$request->toDate;
        $salary->save();

        $title=new Title;
        $salary->employee_id=$employee->id;
        $title->title=$request->title;
        $title->from_date=$request->titlefromdate;
        $title->to_date=$request->titletoDate;
        $title->save();
        return redirect('employees');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::find($id);
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $today=Carbon::now();
        $emp=Employee::find($id);
        return view('employees.create',compact('today','emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::find($id);
        $employee->first_name=$request->fname;
        $employee->last_name=$request->lname;
        $employee->birth_date=$request->dob;
        $employee->hire_date=$request->hireDate;
        $employee->gender=$request->gender;
        $employee->save();
        $salary=Salary::where('employee_id',$employee->id)->first();
        $salary->salary=$request->amount;
        $salary->from_date=$request->fromdate;
        $salary->to_date=$request->toDate;
        $salary->save();

        $title=Title::where('employee_id',$employee->id)->first();
        $title->title=$request->title;
        $title->from_date=$request->titlefromdate;
        $title->to_date=$request->titletoDate;
        $title->save();
        return redirect('employees');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
