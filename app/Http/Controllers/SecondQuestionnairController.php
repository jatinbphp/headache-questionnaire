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

        /*question 1 A*/
        if($request->family_history_of_h_a == 1){
            $values = ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->family_history_of_h_a == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        /*question 1 B*/
        if($request->past_medical_or_psychiatric_disease == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        } elseif($request->past_medical_or_psychiatric_disease == 0) {
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }

        /*question 1 C*/
        if($request->trauma_to_the_head_neck_face == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        } elseif($request->trauma_to_the_head_neck_face == 0) {
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        /*question 1 D*/
        if($request->substance_abuce_inc_coffee_tobacco_drugs_analgesics == 1){
            $values = ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        } elseif($request->substance_abuce_inc_coffee_tobacco_drugs_analgesics == 0) {
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }

        /*question 1 E*/
        if($request->physically_or_emotional_stresfull_surcumstance == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        } elseif($request->physically_or_emotional_stresfull_surcumstance == 0) {
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }

        /*question 2*/
        if($request->question_2 == 'childhood'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_2 == 'adolescence'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_2 == 'in_my_20_s'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_2 == 'in_my_30_s'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_2 == 'in_my_40_s'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_2 == 'in_my_50_s'){
            $values = ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_2 == 'in_and_after_my_60_s'){
            $values = ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }

        /*question 3 a generalized*/
        if($request->question_three_options == 'generalized'){
            if($request->question_3_a == 'forehead_anterior'){
                $values = ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values); 
            }elseif($request->question_3_a == 'back_of_the_head_posterior'){
                $values = ['a' => 1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values); 
            }elseif($request->question_3_a == 'all_over'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values); 
            }elseif($request->question_3_a == 'top_and_middle_of_the_head_above_the_ear_parietal'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values); 
            }elseif($request->question_3_a == 'right_at_the_back_at_the_notch_of_the_head_occipital_nuchal'){
                $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values); 
            }elseif($request->question_3_a == 'on_the_side_and_temple_of_the_head_temporal'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values); 
            }elseif($request->question_3_a == 'from_the_back_of_the_head_to_behind_the_eyes_oculo_temporal_occipital'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values); 
            }
        }

        /*question 3 b*/
        if($request->question_three_options == 'specific'){
            if($request->question_3_b == 'back_of_the_head_occipital'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 1, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }elseif($request->question_3_b == 'cheek_face_chin'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' =>-1, 'l' =>-1, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }elseif($request->question_3_b == 'behind_ear'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' =>-1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }elseif($request->question_3_b == 'base_of_tongue_tonsillar_fossae'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' =>-1, 'l' =>-1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }elseif($request->question_3_b == 'behind_the_eyes_periorbital'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }elseif($request->question_3_b == 'right_at_the_back_notch_of_the_head_occipital_nuchal'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }elseif($request->question_3_b == 'at_the_temple_temporal'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' =>-1, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }elseif($request->question_3_b == 'at_the_temple_and_behind_the_eye_oculofronto_temporal'){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 4*/
        if($request->question_4 == 'mostly_on_one_side'){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' =>-1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_4 == 'both_sides'){
            $values = ['a' =>-1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' =>-1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_4 == 'always_at_the_same_side_laterally_fixed'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' =>-1, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 1, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_4 == 'both_sides_but_one_side_is_worse_latirality_concommitant'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => -1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' =>-1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }

        /*question 5*/
        if($request->question_5 == '1_second'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_5 == '10_seconds_followed_by_refractory_period'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 1, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_5 == '15_minutes_to_3_hours'){
            $values = ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' =>-1, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_5 == 'more_than_30_minutes_but_less_than_4_hours'){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' =>-1, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_5 == '4_hours_to_more_or_less_24_hours'){
            $values = ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_5 == 'much_longer_than_24_hours'){
            $values = ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_5 == 'comes_and_goes'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_5 == 'persistent'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }

        /*question_6*/
        if($request->question_6 == 'mild_0_3_on_visual_analogue_scale'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_6 == 'moderate_4_6_on_visual_analogue_scale'){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_6 == 'severe_7_9_on_visual_analogue_scale'){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_6 == 'excruciating_10_on_visual_analogue_scale'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0];
            $this->setScore($values);
        }

        /*question_7*/
        if($request->question_7 == 'the_pain_develops_within_a_minute_or_can_even_feel_like_an_explosion_of_pain_hyper_accute_or_explosive'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 1, 'k' => 1, 'l' => 1, 'm' =>-1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 1, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_7 == 'quick_progression_accute'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' =>-1, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_7 == 'fast_progression_e_g_about_an_hour_or_two'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' =>-1, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_7 == 'it_takes_long_e_g_several_hours_slow_progression'){ 
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' =>-1, 't' => 0];
            $this->setScore($values);
        }

        /*question 8*/
        if($request->question_8 == 'boring_pain_like_a_drill'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_8 == 'throbing_pain_pulsing_pain'){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' =>-1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' =>-1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_8 == 'pressing_pain'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 1, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_8 == 'needle_like_pain'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_8 == 'electric_shock_pain'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' =>-1, 'g' =>-1, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }elseif($request->question_8 == 'very_unplessant_feeling_of_eyes_being_pushed_out'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' =>-1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values); 
        }

        /*question 9*/
        if($request->red_eyes_crying_eyes_and_or_runny_nose == 1){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->red_eyes_crying_eyes_and_or_runny_nose == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->nausea_vomiting == 1){
            $values = ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' =>-1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->nausea_vomiting == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->you_want_to_avoid_bright_light_or_loud_sounds == 1){
            $values = ['a' => 1, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->you_want_to_avoid_bright_light_or_loud_sounds == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->visual_signs_body_parts_becoming_paraletic == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => -1, 'd' => 0, 'e' => 0, 'f' =>-1, 'g' =>-1, 'h' =>-1, 'i' =>-1, 'j' =>-1, 'k' =>-1, 'l' =>-1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->visual_signs_body_parts_becoming_paraletic == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->numbness_of_toungue == 1){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->numbness_of_toungue == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->depression == 1){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->depression == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->large_pupils_and_or_eyelid_hanging == 1){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->large_pupils_and_or_eyelid_hanging == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->restlessness_and_irritation == 1){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->restlessness_and_irritation == 0){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->other == 1){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->other == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->tenderness_of_the_scalp == 1){
            $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->tenderness_of_the_scalp == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }

        if($request->none == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->none == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - normal physical activity*/
        if($request->normal_physical_activity == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->normal_physical_activity == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 -  menstrual stress*/
        if($request->menstrual_stress == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->menstrual_stress == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - whether changes*/
        if($request->whether_changes == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->whether_changes == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - certain_food_or_drinks*/
        if($request->certain_food_or_drinks == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->certain_food_or_drinks == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - oversleeping*/
        if($request->oversleeping == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->oversleeping == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - under sleeping*/
        if($request->under_sleeping == 1){
            $values = ['a' => 1, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->under_sleeping == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - vasoactive_substance_e_g_alcohol*/
        if($request->vasoactive_substance_e_g_alcohol == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->vasoactive_substance_e_g_alcohol == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - neck_movements*/
        if($request->neck_movements == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->neck_movements == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - jaw_movements*/
        if($request->jaw_movements == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->jaw_movements == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - pharingeal_activity_talking_swallowing*/
        if($request->pharingeal_activity_talking_swallowing == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->pharingeal_activity_talking_swallowing == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - sex_and_exertion*/
        if($request->sex_and_exertion == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->sex_and_exertion == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - cough*/
        if($request->cough == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->cough == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - sudden_turn_of_head*/
        if($request->sudden_turn_of_head == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->sudden_turn_of_head == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - strain*/
        if($request->strain == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->strain == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - dental_procedure_or_minor_facial_trauma*/
        if($request->dental_procedure_or_minor_facial_trauma == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->dental_procedure_or_minor_facial_trauma == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - standing_up*/
        if($request->standing_up == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->standing_up == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - persistant_ackward_neck_position_e_g_reading_or_sleeping*/
        if($request->persistant_ackward_neck_position_e_g_reading_or_sleeping == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->persistant_ackward_neck_position_e_g_reading_or_sleeping == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - laying_down*/
        if($request->laying_down == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->laying_down == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - worsened_by_head_movement*/
        if($request->worsened_by_head_movement == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->worsened_by_head_movement == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 10 - mechanical_stimuli*/
        if($request->mechanical_stimuli == 1){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->mechanical_stimuli == 0){
                $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 11*/
        if($request->question_11 == 'the_head_ache_awokes_me_from_sleep'){
            $values = ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_11 == 'early_morning_when_i_am_sleeping'){
            $values = ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->question_11 == 'the_head_aches_is_coming_during_daytime'){
                $values = ['a' => 0, 'b' => 0, 'c' =>-1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

        /*question 12*/
        if($request->question_12 == 'not_that_often_low'){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }elseif($request->question_12 == 'sometimes_moderate'){
            $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0, 's' => 0, 't' => 0];
            $this->setScore($values);
        }else{
            if($request->question_12 == 'the_whole_time_high'){
                $values = ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 1, 's' => 0, 't' => 0];
                $this->setScore($values);
            }
        }

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
