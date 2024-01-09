<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;


class ThirdQuestionnairController extends Controller{
    
    public function showQuestionsForm(){
        return view('third_questions');
    }

    public function getFormData(Request $request){
        // $request->validate([
        //     'question_1'    => 'required',
        //     'question_2'    => 'required',
        //     'question_3'    => 'required',
        //     'question_4'    => 'required',
        //     'question_5'    => 'required',
        //     'question_6'    => 'required',
        //     'question_7'    => 'required',
        //     'question_8'    => 'required',
        //     'question_9'    => 'required',
        //     'question_10'   => 'required',
        //     'question_13'   => 'required',
        // ]);

        if(Session::has('score')){
            Session::forget('score');
        }

        /*question -1*/
        $question_1 = [
            'trauma'                                => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'brain_heamorrhage'                     => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'darkness'                              => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'instrainious_activity'                 => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'neck_movement'                         => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'don_t_know'                            => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'heamoorhaging_into_the_arterial_wall'  => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'event_that_leaks_icf'                  => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_1_data = isset($question_1[$request->question_1]) ? $question_1[$request->question_1] : null;
        $this->setScore($question_1_data);

        /*question -2*/
        $question_2 = [
            'hyper_acute_in_minutes' => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'acute_within_an_hour'   => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'slow_onset_hours'       => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'progressive'            => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_2_data = isset($question_2[$request->question_2]) ? $question_2[$request->question_2] : null;
        $this->setScore($question_2_data);

        /*question -3*/
        $question_3 = [
            'in_morning'         => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'at_night_nocturnal' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'day_time'           => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'all_the_time'       => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'any_time'           => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_3_data = isset($question_3[$request->question_3]) ? $question_3[$request->question_3] : null;
        $this->setScore($question_3_data);

        /*question -4*/
        $question_4 = [
            'between_2_and_99_years' => ['a' => 1, 'b' => 1, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 1, 'k' => 1, 'l' => 1, 'm' => 1, 'n' => 1, 'o' => 1, 'p' => 1, 'q' => 1, 'r' => 1],
            'midlife'                => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'after_age_60'           => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_4_data = isset($question_4[$request->question_4]) ? $question_4[$request->question_4] : null;
        $this->setScore($question_4_data);

        /*question -5*/
        $question_5 = [
            'neck'                      => ['a' => 0, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'face'                      => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'orbital_and_periorbital'   => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'in_and_around_sholder'     => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'temple'                    => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'frontal'                   => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'posterior'                 => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_5_data = isset($question_5[$request->question_5]) ? $question_5[$request->question_5] : null;
        $this->setScore($question_5_data);

        /*question -6*/
        $question_6 = [
            'both_sides_bilataral'               => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'only_left_or_right_side_unilateral' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_6_data = isset($question_6[$request->question_6]) ? $question_6[$request->question_6] : null;
        $this->setScore($question_6_data);

        /*question -7*/
        $question_7 = [
            'platonic'      => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'progressive'   => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_7_data = isset($question_7[$request->question_7]) ? $question_7[$request->question_7] : null;
        $this->setScore($question_7_data);

        /*question -8*/
        $question_8 = [
            'constant'      => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'intermittant'  => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_8_data = isset($question_8[$request->question_8]) ? $question_8[$request->question_8] : null;
        $this->setScore($question_8_data);

        /*question -9*/
        $question_9 = [
            'mild_head_ache' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0],
            'severe_pain'    => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_9_data = isset($question_9[$request->question_9]) ? $question_9[$request->question_9] : null;
        $this->setScore($question_9_data);

        /*question -10*/
        $question_10 = [
            'pulsatile_throbing' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'oppressive'         => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
            'difuse_general'     => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_10_data = isset($question_10[$request->question_10]) ? $question_10[$request->question_10] : null;
        $this->setScore($question_10_data);

        /*question -10*/




        return Session::get('score');

    }

    private function setScore($values){
        if(!isset($values) && empty($values)){
            return null;
        }

        $keys = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r'];

        $data = [];
        foreach ($keys as $keys) {
            $data[$keys] = isset(Session::get('score')[$keys]) ? Session::get('score')[$keys] + $values[$keys] : $values[$keys];
        }

        Session::put('score', $data);
        return Session::get('score');
    }
}
