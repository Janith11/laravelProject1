<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\EmployeeAttendances;
use App\Expense;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Salary;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index(){

        $startofmonth = Carbon::now()->startOfMonth();
        $endofmonth = Carbon::now()->endOfMonth();

        $instructors = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }])->get();

        $attendance_count = EmployeeAttendances::whereBetween('date', [$startofmonth, $endofmonth])->where('status', 1)->select('user_id', DB::raw('count(*) as count'))
        ->groupBy('user_id')->get();

        $expense = Expense::sum('amount');

        $instructor_ids = [];
        foreach ($instructors as $instructor) {
            $instructor_ids[] = $instructor->user_id;
        }

        $salary = Salary::whereBetween('date', [$startofmonth, $endofmonth])->count();
        if ($salary == 0) {
            foreach ($instructor_ids as $id) {
                Salary::create([
                    'user_id' => $id,
                    'date' => $startofmonth,
                    'amount' => '0',
                ]);
            }
        }

        $details = CompanyDetails::first();
        $logo = $details->logo;

        return view('owner.salary.salary', compact('instructors', 'attendance_count', 'expense', 'logo'));
    }

    public function calculatesalary($id){

        $startofmonth = Carbon::now()->startOfMonth();
        $endofmonth = Carbon::now()->endOfMonth();

        $instructors = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }])->where('user_id', $id)->get();
        $attendance = EmployeeAttendances::whereBetween('date', [$startofmonth, $endofmonth])->where('user_id', $id)->where('status', 1)->count();

        $details = CompanyDetails::first();
        $logo = $details->logo;

        return view('owner.salary.calculatesalary', compact('instructors', 'attendance', 'logo'));
    }

    public function savesalary(Request $request){

        $this->validate($request, [
            'salary' => 'required',
        ]);

        $salary = $request->salary;
        $user_id = $request->id;

        $today = Carbon::now()->today();
        $startofmonth = Carbon::now()->startOfMonth();
        $endofmonth =Carbon::now()->endOfMonth();

        if ($today == $endofmonth) {
            $records = Salary::where('user_id', $user_id)->where('date', $startofmonth)->get();
            $record_ids = [];
            foreach ($records as $record) {
                $record_ids[] = $record->id;
            }
            $update_record = Salary::find($record_ids[0]);
            $update_record->date = $endofmonth;
            $update_record->amount = $salary;
            $update_record->save();

            return redirect()->route('salary')->with('successmsg', 'Salary added Successfully !!');
        }else{
            return back()->with('errormsg', 'You Cannot calculate slary erly !!');
        }

    }

    public function history(){

        $salarys = Salary::all()->reverse();
        $instructors = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }])->get();

        $expenses = Expense::all()->reverse();

        $details = CompanyDetails::first();
        $logo = $details->logo;

        return view('owner.salary.history', compact('salarys', 'instructors', 'expenses', 'logo'));
    }
}
