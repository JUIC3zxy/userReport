<?php

namespace App\Http\Controllers;

use App\Models\NewUser;
use Illuminate\Http\Request;
use Carbon\Carbon;


class UserController extends Controller
{
    public function generateReport(Request $request)
    {
        //validate start date is before end date
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        // get the input data
        $startDate =$request['start_date'];
        $endDate = $request['end_date'];

        return redirect()->route('showReport', [
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);
    }

    //count users of every month
    public function getMonthlyUserData($users)
    {
        $data = $users->groupBy(
                        function($user){
                            return Carbon::parse($user->start_date)->format('Y-M');
                        }
                        )->map(
                            function($group){
                                return $group->count();
                            }
                        );
                 
        return $data;
    }


    // Display the report
    public function showReport(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $users = NewUser::whereBetween('start_date', [$startDate, $endDate])->get();
        $verifiedCount=$users->where('verified',1)->count();
        $unverifiedCount=$users->where('verified',0)->count();
        
        $labels_verified_user = ['Verified Users', 'Unverified Users'];
        $data_verified_user = [$verifiedCount, $unverifiedCount];
        $monthly_data=$this->getMonthlyUserData($users);

        $labels_monthly=  $monthly_data->keys();
        $counts_monthly=  $monthly_data->values();

        //pass data to usersChart
        return view('usersChart', compact('users','labels_verified_user','data_verified_user' ,'startDate', 'endDate','counts_monthly','labels_monthly','monthly_data'));
    }
}
