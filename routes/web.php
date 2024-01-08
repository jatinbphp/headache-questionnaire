<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnairController;
use App\Http\Controllers\SecondQuestionnairController;
use App\Http\Controllers\ThirdQuestionnairController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('formData',[QuestionnairController::class,'getFormData'])->name('getFormData');
Route::get('/',[QuestionnairController::class,'showQuestionsForm']);

/*second-questionnaire*/
Route::get('2',[SecondQuestionnairController::class,'showQuestionsForm']);
Route::post('secondFormData',[SecondQuestionnairController::class,'getFormData'])->name('getSecondFormData');

/*third-questionnaire*/
Route::get('3',[ThirdQuestionnairController::class,'showQuestionsForm']);
Route::post('thirdFormData',[ThirdQuestionnairController::class,'getFormData'])->name('getThirdFormData');





