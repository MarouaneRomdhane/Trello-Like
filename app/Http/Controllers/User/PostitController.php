<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Column;
use App\Models\Card;
use App\Models\Table;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class PostitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //All CREATE functions
    public function postit($id_tables)
    {

        // $column = Column::all();
        // $card = Card::all();
        // DB::table('users')
        //     ->join('labdetails2', 'users.lab_name', '=', 'labdetails2.lab_name')
        //     ->select('labdetails2.lab_name', 'labdetails2.pc_name')
        //     ->get();
        // $test2 = Column::select('table_id')->get();

        // $test = Table::all()->toArray();
        // $test3 = reset($test);
        // $test4 = reset($test3);

        // dd($id);

        // $columnId = Column::where('table_id', Table::select('id')->get());
        // foreach ($columnId as $columnIdpush) {
        // }
        // $test = $test->id;
        // $test = Table::select('id')->get();
        // $table_id = Column::select('table_id')->where('table_id', Table::select('id'))->get();
        // dd($table_id);

        // $user = Auth::user()->id;

        // $tab_arr = Table::all()->toArray();
        // $tab_id = array_column($tab_arr, 'id');

        // $col_arr = Column::all()->toArray();
        // $col_tabid = array_column($col_arr, 'table_id');
        // dd($col_tabid);


        // $column1 = Column::where('user_id', Auth::user()->id)->firstOrFail();
        // dd($column1);
        // $column1->table()->column()->get();




        // $tables = table::find(9);
        // $tablecolumns = $tables->columns;

        // $tables = table::find();
        // $tablecolumnsTwo = $tables->columns;

        // $tables = table::find();
        // $tablecolumnsThree = $tables->columns;

        //dd($tables->columns);

        // return view(
        //     'user.postit',
        //     compact(' $tablecolumns')
        // );
        // return view(
        //     'user.postit',
        //     [
        //         'columns' => Column::where('user_id', Auth::user()->id)
        // ->orWhere($col_tabid, $tab_id)
        // //         ->get(),
        //     ]
        // );

        // $test = Table::select('id');
        // dd($test);
        // dd($id_tables);
        // $tableselect=Table::select()

        return view(
            'user.postit',
            [
                'columns' => Column::where('user_id', Auth::user()->id)
                    ->where('table_id', $id_tables)
                    // ->where('table_id', Table::select('id'))
                    ->get(),
                'cards' => Card::all(),
                'comments' => Comment::all(),
                'table' => $id_tables,
                // 'tables' => $id_tables,
            ]
        );
    }
    public function addCol(Request $request, $id_tables)
    {
        // dd($id_tables);

        // dd($request);
        $user = auth()->user();
        $column = new Column;
        $column->title = $request->title;
        $column->user_id = $user->id;
        $column->table_id = $id_tables;

        $column->save();


        return back();
        // dd($id_tables);

        // $columnId = Column::where('table_id', $id_tables)->get();

        // foreach ($columnId as $columnIdpush) {
        //     $registerID = $columnIdpush->table_id;
        // }

        // dd($id_tables);
        // $columnId = Table::where('user_id', Auth::user()->id)->get();
        // foreach ($columnId as $columnIdpush) {
        // $registerID = $columnIdpush->table_id;
        // }
        // dd($columnIdpush);
        // $columnId = Table::where('user_id', Auth::user()->id)->value('user_id');
        // $columnId = id de la table
        // $columnId = Table::select('id')->where('user_id', Auth::user()->id)->value('name');
        // dd($columnId);

    }

    public function addCard(Request $request, $id_tables, $id_column)
    {
        // $cardId = 6;
        // dd($cardId);
        // dd($id_tables);

        $user = auth()->user();
        $card = new Card;
        $card->todo = $request->todo;
        $card->user_id = $user->id;
        $card->column_id = $id_column;
        // dd($card);

        $card->save();


        return back();
    }
    public function addCom(Request $request, $id_tables, $id_column, $id_card)
    {

        $user = auth()->user();
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = $user->id;
        $comment->card_id = $id_card;
        // dd($id_card);
        // dd($comment);

        $comment->save();

        return back();
    }
    //All Edit functions
    public function editCol(Request $request, $id_tables)
    {

        $id = auth()->id();
        $column = Column::where('id', $id_tables)->first();

        if ($request->title) {
            $column->title = $request->title;
        }

        $column->save();
        return back();
    }
    public function editCard(Request $request,  $id_tables, $id_column)
    {
        $id = auth()->id();
        $column = Card::where('id', $id_column)->first();
        if ($request->todo) {
            $column->todo = $request->todo;
        }
        $column->save();
        return back();
    }
    public function editCom(Request $request, $id_tables, $id_column, $id_card)
    {

        $id = auth()->id();
        $com = Comment::where('id', $id_card)->first();
        if ($request->comment) {
            $com->comment = $request->comment;
        }

        $com->save();
        return back();
    }
    //END All Edit functions

    // all Delete functions
    public function delCol($id_tables)
    {
        Column::where('id', $id_tables)->delete();
        return back();
    }

    public function delCard($id_tables, $column_id)
    {

        Card::where('id', $column_id)->delete();
        return back();
    }

    public function delCom($id_tables, $column_id, $card_id)
    {

        Comment::where('id', $card_id)->delete();
        return back();
    }

    // END all Delete functions
}
