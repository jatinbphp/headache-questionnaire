<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThirdQuestionnairController extends Controller{
    
    public function showQuestionsForm(){
        return view('third_questions');
    }
}
