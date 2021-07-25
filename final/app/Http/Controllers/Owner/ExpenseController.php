<?php

namespace App\Http\Controllers\Owner;

use App\Expense;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function makeexpense(Request $request){

        $this->validate($request, [
            'reson' => 'required|min:10',
            'amount' => 'required',
        ]);

        $date = Carbon::now()->today();
        $reson = $request->reson;
        $amount = $request->amount;

        if (is_numeric($amount)) {
            Expense::create([
                'date' => $date,
                'reson' => $reson,
                'amount' => $amount
            ]);
            return redirect()->route('salary')->with('successmsg', 'Expence aded Succesfully !!');
        }else{
            return back()->with('errormsg', 'Invalied Input !!');
        }

    }
}
