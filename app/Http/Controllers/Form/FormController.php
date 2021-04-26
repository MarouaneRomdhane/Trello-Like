<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form()
    {
        return view('Form.form');
    }

    public function store(Request $request)
    {
        return back();
        // $form = new Form();
        // $form->com = $request->com;
        // $form->name = $request->name;
    }
}
