<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\User;
use App\Models\Column;


// use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {

        // $table = DB::table('tables')->get();

        // dd($table);
        // $id = auth()->id();
        // $id = User::find($id);
        // $id = $id->id;
        // // dd($id);
        return view(
            'user.dashboard',
            [
                'tables' => Table::where('user_id', Auth::user()->id)->get()
            ]
        );
    }


    public function sendTable(Request $request)
    {
        $user = auth()->user();
        $table = new Table;
        $table->title = $request->title;
        $table->user_id = $user->id;

        $table->save();

        return view('user.dashboard', ['tables' => Table::where('user_id', Auth::user()->id)->get(),]);
    }
    public function editTable(Request $request, $id_tables)
    {

        $id = auth()->id();
        // $table = Table::find($id);
        $table = Table::where('id', $id_tables)->first();

        if ($request->title) {
            $table->title = $request->title;
        }

        $table->save();

        return back();
    }

    //All delete functions

    public function delTable($id_tables)
    {
        Table::where('id', $id_tables)->delete();
        return back();
    }
}
