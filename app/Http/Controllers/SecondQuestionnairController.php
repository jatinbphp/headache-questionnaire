<?php

/*
YELLOW  = -1 
WHITE   = 0
GREEN   = 1
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;



class SecondQuestionnairController extends Controller{
    public function showQuestionsForm(){
        return view('second_questions');
    }

    public function getFormData(Request $request){
        $request->validate([
            'question_2'    => 'required',
            'question_3_a'  => 'sometimes|required',
            'question_3_b'  => 'sometimes|required',
            'question_4'    => 'required',
            'question_5'    => 'required',
            'question_6'    => 'required',
            'question_7'    => 'required',
            'question_8'    => 'required',
            'question_11'   => 'required',
            'question_12'   => 'required',
        ]);

        if(Session::has('score')){
            Session::forget('score');
        }

        /*Family History of H/A*/
        $family_history_of_h_a = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $family_history_of_h_a_data = isset($family_history_of_h_a[$request->family_history_of_h_a]) ? $family_history_of_h_a[$request->family_history_of_h_a] : null;
        $this->setScore($family_history_of_h_a_data);

        /*Past medical or psychiatric disease*/
        $past_medical = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $past_medical_data = isset($past_medical[$request->past_medical]) ? $past_medical[$request->past_medical] : null;
        $this->setScore($past_medical_data);

        /*Trauma to the head/Neck/face*/
        $trauma = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $trauma_data = isset($trauma[$request->trauma]) ? $trauma[$request->trauma] : null;
        $this->setScore($trauma_data);

        /*Substance abuce inc. Coffee, tobacco, Drugs, Analgesics*/
        $substance_abuce = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $substance_abuce_data = isset($substance_abuce[$request->substance_abuce]) ? $substance_abuce[$request->substance_abuce] : null;
        $this->setScore($substance_abuce_data);

        /*Physically or Emotional stresfull surcumstance*/
        $stresfull_surcumstance = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $stresfull_surcumstance_data = isset($stresfull_surcumstance[$request->stresfull_surcumstance]) ? $stresfull_surcumstance[$request->stresfull_surcumstance] : null;
        $this->setScore($stresfull_surcumstance_data);

        /*Question 2: At what age did your head ache start*/
        $question_2 = [
            'childhood'             => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'adolescence'           => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'in_my_20_s'            => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'in_my_30_s'            => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'in_my_40_s'            => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'in_my_50_s'            => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'in_and_after_my_60_s'  => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $question_2_data = isset($question_2[$request->question_2]) ? $question_2[$request->question_2] : null;
        $this->setScore($question_2_data);

        /*Generalized*/
        if($request->question_three_options == 'generalized'){
            $question_3_a = [
                'anterior'                 => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'posterior'                => ['a' => 1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'all_over'                 => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'parietal'                 => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'occipital_nuchal'         => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'temporal'                 => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'oculo_temporal_occipital' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            ];

            $question_3_a_data = isset($question_3_a[$request->question_3_a]) ? $question_3_a[$request->question_3_a] : null;
            $this->setScore($question_3_a_data);
        }

        /*Specific*/
        if($request->question_three_options == 'specific'){
            $question_3_b = [
                'occipital'            => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 1, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'cheek_face_chin'      => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' =>-1, 'l' =>-1, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'behind_ear'           => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' =>-1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'base_of_tongue'       => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' =>-1, 'l' =>-1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'periorbital'          => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'occipital_nuchal'     => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'temporal'             => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' =>-1, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
                'oculofronto_temporal' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            ];

            $question_3_b_data = isset($question_3_b[$request->question_3_b]) ? $question_3_b[$request->question_3_b] : null;
            $this->setScore($question_3_b_data);
        }

        /*Question 4: On which side of the head is the head ache*/
        $question_4 = [
            'unilateral'                => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' =>-1, 'r' => 0, 's' => 0, 't' => 0],
            'bilateral'                 => ['a' =>-1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' =>-1, 'r' => 0, 's' => 0, 't' => 0],
            'laterally_fixed'           => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' =>-1, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 1, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0],
            'latirality_concommitant'   => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' =>-1, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $question_4_data = isset($question_4[$request->question_4]) ? $question_4[$request->question_4] : null;
        $this->setScore($question_4_data);

        /*Question 5: How long does the pain last?*/
        $question_5 = [
            '1_second'          => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '10_seconds'        => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 1, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '15_minutes'        => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' =>-1, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '30_minutes'        => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' =>-1, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0],
            '4_hours'           => ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0],
            '24_hours'          => ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0],
            'comes_and_goes'    => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'persistent'        => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];
        
        $question_5_data = isset($question_5[$request->question_5]) ? $question_5[$request->question_5] : null;
        $this->setScore($question_5_data);

        /*Question 6: How intesnse or hw much is the pain hurting*/
        $question_6 = [
            'mild'        => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'moderate'    => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'severe'      => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'exrutiating' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0],
        ];

        $question_6_data = isset($question_6[$request->question_6]) ? $question_6[$request->question_6] : null;
        $this->setScore($question_6_data);

        /*Question 7: From when the pain is starting till it is on its worst, which statement is most accurate*/
        $question_7 = [
            'explosive'         => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 1, 'k' => 1, 'l' => 1, 'm' =>-1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0],
            'accute'            => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' =>-1, 't' => 0],
            'fast_progression'  => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' =>-1, 't' => 0],
            'slow_progression'  => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' =>-1, 't' => 0],
        ];

        $question_7_data = isset($question_7[$request->question_7]) ? $question_7[$request->question_7] : null;
        $this->setScore($question_7_data);

        /*Question 8: Which statement describes the feeling of the pain the best*/
        $question_8 = [
            'boring_pain_'          => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'throbing_pain'         => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' =>-1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'pressing_pain'         => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 1, 's' => 0, 't' => 0],
            'needle_like_pain'      => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'electric_shock_pain'   => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'unplessant_feeling'    => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' =>-1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $question_8_data = isset($question_8[$request->question_8]) ? $question_8[$request->question_8] : null;
        $this->setScore($question_8_data);

        /*Question 9: Are you experiencing any of the following at the same time of the head ache*/
        $runny_nose = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $runny_nose_data = isset($runny_nose[$request->runny_nose]) ? $runny_nose[$request->runny_nose] : null;
        $this->setScore($runny_nose_data);

        /*Nausea/Vomiting*/
        $nausea_vomiting = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' =>-1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $nausea_vomiting_data = isset($nausea_vomiting[$request->nausea_vomiting]) ? $nausea_vomiting[$request->nausea_vomiting] : null;
        $this->setScore($nausea_vomiting_data);

        /*You want to avoid bright light or loud sounds (Photophobia, Phonophobia)*/
        $photophobia = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $photophobia_data = isset($photophobia[$request->photophobia]) ? $photophobia[$request->photophobia] : null;
        $this->setScore($photophobia_data);  

        /*Visual Signs, Body parts becoming paraletic (Focal Neurological Phenomina: Aura, Paresthesia, aphasia)*/
        $paraletic = [
            '1' => ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' =>-1, 'g' =>-1, 'h' =>-1, 'i' =>-1, 'j' =>-1, 'k' =>-1, 'l' =>-1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0],
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $paraletic_data = isset($paraletic[$request->paraletic]) ? $paraletic[$request->paraletic] : null;
        $this->setScore($paraletic_data);

        /*Numbness of toungue*/
        $numbness_of_toungue = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $numbness_of_toungue_data = isset($numbness_of_toungue[$request->numbness_of_toungue]) ? $numbness_of_toungue[$request->numbness_of_toungue] : null;
        $this->setScore($numbness_of_toungue_data);

        /*Depression*/
        $depression = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $depression_data = isset($depression[$request->depression]) ? $depression[$request->depression] : null;
        $this->setScore($depression_data);

        /*Large Pupils and/or Eyelid hanging (Miosis and/or Ptosis)*/
        $large_pupils = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0], 
            '1' => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $large_pupils_data = isset($large_pupils[$request->large_pupils]) ? $large_pupils[$request->large_pupils] : null;
        $this->setScore($large_pupils_data);

        /*Restlessness and Irritation (agitation/irritation)*/
        $restlessness = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $restlessness_data = isset($restlessness[$request->restlessness]) ? $restlessness[$request->restlessness] : null;
        $this->setScore($restlessness_data);

        /*Other*/
        $other = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $other_data = isset($other[$request->other]) ? $other[$request->other] : null;
        $this->setScore($other_data);

        /*Tenderness of the Scalp (Pericranial Tenderness)*/
        $pericranial_tenderness = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $pericranial_tenderness_data = isset($pericranial_tenderness[$request->pericranial_tenderness]) ? $pericranial_tenderness[$request->pericranial_tenderness] : null;
        $this->setScore($pericranial_tenderness_data);

        /*None*/
        $none = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];
       
        $none_data = isset($none[$request->none]) ? $none[$request->none] : null;
        $this->setScore($none_data);

        /*Question 10: is any of the following activating the head ache, or making the head ache worse*/
        $physical_activity = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $physical_activity_data = isset($physical_activity[$request->physical_activity]) ? $physical_activity[$request->physical_activity] : null;
        $this->setScore($physical_activity_data);

        /*Menstrual Stress*/
        $menstrual_stress = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $menstrual_stress_data = isset($menstrual_stress[$request->menstrual_stress]) ? $menstrual_stress[$request->menstrual_stress] : null;
        $this->setScore($menstrual_stress_data);

        /*Whether changes*/
        $whether_changes = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $whether_changes_data = isset($whether_changes[$request->whether_changes]) ? $whether_changes[$request->whether_changes] : null;
        $this->setScore($whether_changes_data);

        /*certain food or drinks*/
        $certain_food_or_drinks = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $certain_food_or_drinks_data = isset($certain_food_or_drinks[$request->certain_food_or_drinks]) ? $certain_food_or_drinks[$request->certain_food_or_drinks] : null;
        $this->setScore($certain_food_or_drinks_data);

        /*Oversleeping*/
        $oversleeping = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $oversleeping_data = isset($oversleeping[$request->oversleeping]) ? $oversleeping[$request->oversleeping] : null;
        $this->setScore($oversleeping_data);

        /*Under sleeping*/
        $under_sleeping = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $under_sleeping_data = isset($under_sleeping[$request->under_sleeping]) ? $under_sleeping[$request->under_sleeping] : null;
        $this->setScore($under_sleeping_data);

        /*question 10 - vasoactive_substance_e_g_alcohol*/
        $vasoactive_substance_e_g_alcohol = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $vasoactive_substance_e_g_alcohol_data = isset($vasoactive_substance_e_g_alcohol[$request->vasoactive_substance_e_g_alcohol]) ? $vasoactive_substance_e_g_alcohol[$request->vasoactive_substance_e_g_alcohol] : null;
        $this->setScore($vasoactive_substance_e_g_alcohol_data);

        /*question 10 - neck_movements*/
        $neck_movements = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $neck_movements_data = isset($neck_movements[$request->neck_movements]) ? $neck_movements[$request->neck_movements] : null;
        $this->setScore($neck_movements_data);

        /*question 10 - jaw_movements*/
        $jaw_movements = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $jaw_movements_data = isset($jaw_movements[$request->jaw_movements]) ? $jaw_movements[$request->jaw_movements] : null;
        $this->setScore($jaw_movements_data);

        /*question 10 - pharingeal_activity_talking_swallowing*/
        $pharingeal_activity_talking_swallowing = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $pharingeal_activity_talking_swallowing_data = isset($pharingeal_activity_talking_swallowing[$request->pharingeal_activity_talking_swallowing]) ? $pharingeal_activity_talking_swallowing[$request->pharingeal_activity_talking_swallowing] : null;
        $this->setScore($pharingeal_activity_talking_swallowing_data);

        /*question 10 - sex_and_exertion*/
        $sex_and_exertion = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $sex_and_exertion_data = isset($sex_and_exertion[$request->sex_and_exertion]) ? $sex_and_exertion[$request->sex_and_exertion] : null;
        $this->setScore($sex_and_exertion_data);

        /*question 10 - cough*/
        $cough = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $cough_data = isset($cough[$request->cough]) ? $cough[$request->cough] : null;
        $this->setScore($cough_data);

        /*question 10 - sudden_turn_of_head*/
        $sudden_turn_of_head = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $sudden_turn_of_head_data = isset($sudden_turn_of_head[$request->sudden_turn_of_head]) ? $sudden_turn_of_head[$request->sudden_turn_of_head] : null;
        $this->setScore($sudden_turn_of_head_data);

        /*question 10 - strain*/
        $strain = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $strain_data = isset($strain[$request->strain]) ? $strain[$request->strain] : null;
        $this->setScore($strain_data);

        /*question 10 - dental_procedure_or_minor_facial_trauma*/
        $dental_procedure_or_minor_facial_trauma = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $dental_procedure_or_minor_facial_trauma_data = isset($dental_procedure_or_minor_facial_trauma[$request->dental_procedure_or_minor_facial_trauma]) ? $dental_procedure_or_minor_facial_trauma[$request->dental_procedure_or_minor_facial_trauma] : null;
        $this->setScore($dental_procedure_or_minor_facial_trauma_data);

        /*question 10 - standing_up*/
        $standing_up = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $standing_up_data = isset($standing_up[$request->standing_up]) ? $standing_up[$request->standing_up] : null;
        $this->setScore($standing_up_data);

        /*question 10 - persistant_ackward_neck_position_e_g_reading_or_sleeping*/
        $persistent_awkward = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $persistent_awkward_data = isset($persistent_awkward[$request->persistent_awkward]) ? $persistent_awkward[$request->persistent_awkward] : null;
        $this->setScore($persistent_awkward_data);

        /*question 10 - laying_down*/
        $laying_down = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $laying_down_data = isset($laying_down[$request->laying_down]) ? $laying_down[$request->laying_down] : null;
        $this->setScore($laying_down_data);

        /*question 10 - worsened_by_head_movement*/
        $worsened_by_head_movement = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $worsened_by_head_movement_data = isset($worsened_by_head_movement[$request->worsened_by_head_movement]) ? $worsened_by_head_movement[$request->worsened_by_head_movement] : null;
        $this->setScore($worsened_by_head_movement_data);

        /*question 10 - mechanical_stimuli*/
        $mechanical_stimuli = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];

        $mechanical_stimuli_data = isset($mechanical_stimuli[$request->mechanical_stimuli]) ? $mechanical_stimuli[$request->mechanical_stimuli] : null;
        $this->setScore($mechanical_stimuli_data);

        /*question 11*/
        $question_11 = [
            'from_sleep'    => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'when_sleeping' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'during_daytime'=> ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
        ];  

        $question_11_data = isset($question_11[$request->question_11]) ? $question_11[$request->question_11] : null;
        $this->setScore($question_11_data);

        /*question 12*/
        $question_12 = [
            'low'       => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'moderate'  => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0],
            'high'      => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 1, 's' => 0, 't' => 0],
        ];

        $question_12_data = isset($question_12[$request->question_12]) ? $question_12[$request->question_12] : null;
        $this->setScore($question_12_data);

        $score = 0;
        if(Session::has('score') && !empty(Session::get('score'))){
            foreach(Session::get('score') as $keys => $values){
                $score = (($score) + ($values));
            }
        }

        $results = [
            'Migrain'                           => isset(Session::get('score')['a']) ? Session::get('score')['a'] : null,
            'Rebound H/A'                       => isset(Session::get('score')['b']) ? Session::get('score')['b'] : null,
            'Hypnic H/A'                        => isset(Session::get('score')['c']) ? Session::get('score')['c'] : null,
            'Cervicogenic H/A'                  => isset(Session::get('score')['d']) ? Session::get('score')['d'] : null,
            'Tention H/A'                       => isset(Session::get('score')['e']) ? Session::get('score')['e'] : null,
            'Cluster H/A'                       => isset(Session::get('score')['f']) ? Session::get('score')['f'] : null,
            'Paoxysmal Hemicrania'              => isset(Session::get('score')['g']) ? Session::get('score')['g'] : null,
            'SUNCT'                             => isset(Session::get('score')['h']) ? Session::get('score')['h'] : null,
            'Trigiminal Neuralgia'              => isset(Session::get('score')['i']) ? Session::get('score')['i'] : null,
            'Glossopharyngial Neuralgia'        => isset(Session::get('score')['j']) ? Session::get('score')['j'] : null,
            'Occipital Neuralgia'               => isset(Session::get('score')['k']) ? Session::get('score')['k'] : null,
            'Neck-Toungue Syndrome'             => isset(Session::get('score')['l']) ? Session::get('score')['l'] : null,
            'Persistant Idiopathic Facial Pain' => isset(Session::get('score')['m']) ? Session::get('score')['m'] : null,
            'Primary Stabbing H/A'              => isset(Session::get('score')['n']) ? Session::get('score')['n'] : null,
            'Temporal Madibular disorders'      => isset(Session::get('score')['o']) ? Session::get('score')['o'] : null,
            'H/A induced by Exercion,Sex, cough'=> isset(Session::get('score')['p']) ? Session::get('score')['p'] : null,
            'Hemicrania Continua'               => isset(Session::get('score')['q']) ? Session::get('score')['q'] : null,
            'Daily Persistant H/A'              => isset(Session::get('score')['r']) ? Session::get('score')['r'] : null,
            'Thunder Clap H/A'                  => isset(Session::get('score')['s']) ? Session::get('score')['s'] : null,
            '2dnary Heay Ache'                  => isset(Session::get('score')['t']) ? Session::get('score')['t'] : null,
        ];
        
        /*send mail to the admin*/
        //$this->sendMail($score, $results);

        $response = [
            'results'    => $results,
            'score'      => $score,
            'status'     => 200,
        ];

        return response()->json($response, 200);
    }

    private function setScore($values){
        if(!isset($values) || empty($values)){
            return null;
        }

        $keys = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't'];

        $data = [];
        foreach ($keys as $keys) {
            $data[$keys] = isset(Session::get('score')[$keys]) ? (Session::get('score')[$keys]) + ($values[$keys]) : $values[$keys];
        }

        Session::put('score', $data);
        return Session::get('score');
    }

    public function sendMail($score, $results){
        Mail::send('survey_results', ['results'=> $results,'score'=>$score ], function ($message) {
            $message->from('info@admin.com', 'Headache');
            $message->to("gert@gsdm.co.za")->subject('New Form Submitted: '.date("Y-m-d"));
        }); 
    }
}
