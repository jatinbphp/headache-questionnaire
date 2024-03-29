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
        $request->validate([
            'question_1'    => 'required',
            'question_2'    => 'required',
            'question_3'    => 'required',
            'question_4'    => 'required',
            'question_5'    => 'required',
            'question_6'    => 'required',
            'question_7'    => 'required',
            'question_8'    => 'required',
            'question_9'    => 'required',
            'question_10'   => 'required',
            'question_13'   => 'required',
        ]);

        if(Session::has('score')){
            Session::forget('score');
        }

        /*Question 1: What triggered or triggers your head ache?*/
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

        /*Question 2: How long does it take from when you become aware of the head ache, until it is at its worst?*/
        $question_2 = [
            'hyper_acute_in_minutes' => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'acute_within_an_hour'   => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'slow_onset_hours'       => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'progressive'            => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_2_data = isset($question_2[$request->question_2]) ? $question_2[$request->question_2] : null;
        $this->setScore($question_2_data);

        /*Question 3: During a typical 24 hour period, when is the head ache most likely to occur?*/
        $question_3 = [
            'in_morning'         => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'at_night_nocturnal' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'day_time'           => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'all_the_time'       => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'any_time'           => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_3_data = isset($question_3[$request->question_3]) ? $question_3[$request->question_3] : null;
        $this->setScore($question_3_data);

        /*Question 4: How old were you when the head ache started?*/
        $question_4 = [
            'between_2_and_99_years' => ['a' => 1, 'b' => 1, 'c' => 1, 'd' => 0, 'e' => 1, 'f' => 1, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 1, 'k' => 1, 'l' => 1, 'm' => 1, 'n' => 1, 'o' => 1, 'p' => 1, 'q' => 1, 'r' => 1],
            'midlife'                => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'after_age_60'           => ['a' => 1, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_4_data = isset($question_4[$request->question_4]) ? $question_4[$request->question_4] : null;
        $this->setScore($question_4_data);

        /*Question 5: Where on your head is the head ache?*/
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

        /*Question 6: On which side of the head is the head ache?*/
        $question_6 = [
            'both_sides_bilataral'               => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'only_left_or_right_side_unilateral' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_6_data = isset($question_6[$request->question_6]) ? $question_6[$request->question_6] : null;
        $this->setScore($question_6_data);

        /*Question 7: Which describe your head ache the best?*/
        $question_7 = [
            'platonic'      => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'progressive'   => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_7_data = isset($question_7[$request->question_7]) ? $question_7[$request->question_7] : null;
        $this->setScore($question_7_data);

        /*Question 8: which describe your head ache the best?*/
        $question_8 = [
            'constant'      => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'intermittant'  => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_8_data = isset($question_8[$request->question_8]) ? $question_8[$request->question_8] : null;
        $this->setScore($question_8_data);

        /*Question 9: How severe is the pain?*/
        $question_9 = [
            'mild_head_ache' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0],
            'severe_pain'    => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_9_data = isset($question_9[$request->question_9]) ? $question_9[$request->question_9] : null;
        $this->setScore($question_9_data);

        /*Question 10: Which one describes the character of the pain most accurately?*/
        $question_10 = [
            'pulsatile_throbing' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'oppressive'         => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
            'difuse_general'     => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_10_data = isset($question_10[$request->question_10]) ? $question_10[$request->question_10] : null;
        $this->setScore($question_10_data);

        /*question -11 Poor Memmory*/
        $poor_memmory = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $poor_memmory_data = isset($poor_memmory[$request->poor_memmory]) ? $poor_memmory[$request->poor_memmory] : null;
        $this->setScore($poor_memmory_data);

        /*Focal Neuro signs. Loss of movement, loss of sensation, hemineglect etc, speech difficulties*/
        $focal_neuro_signs = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $focal_neuro_signs_data = isset($focal_neuro_signs[$request->focal_neuro_signs]) ? $focal_neuro_signs[$request->focal_neuro_signs] : null;
        $this->setScore($focal_neuro_signs_data);

        /*Poor Concentration*/
        $poor_concentration = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $poor_concentration_data = isset($poor_concentration[$request->poor_concentration]) ? $poor_concentration[$request->poor_concentration] : null;
        $this->setScore($poor_concentration_data);

        /*Irritability*/
        $irritability = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $irritability_data = isset($irritability[$request->irritability]) ? $irritability[$request->irritability] : null;
        $this->setScore($irritability_data);

        /*Emotional Lability*/
        $emotional_lability = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $emotional_lability_data = isset($emotional_lability[$request->emotional_lability]) ? $emotional_lability[$request->emotional_lability] : null;
        $this->setScore($emotional_lability_data);

        /*Poor sight*/
        $poor_sight = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $poor_sight_data = isset($poor_sight[$request->poor_sight]) ? $poor_sight[$request->poor_sight] : null;
        $this->setScore($poor_sight_data);

        /*Squinting*/
        $squinting = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 1, 'n' => 0, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $squinting_data = isset($squinting[$request->squinting]) ? $squinting[$request->squinting] : null;
        $this->setScore($squinting_data);

        /*Insomnia*/
        $insomnia = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $insomnia_data = isset($insomnia[$request->insomnia]) ? $insomnia[$request->insomnia] : null;
        $this->setScore($insomnia_data);

        /*Equilibrium desturbance*/
        $equilibrium_desturbance = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 1, 'b' => 1, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $equilibrium_desturbance_data = isset($equilibrium_desturbance[$request->equilibrium_desturbance]) ? $equilibrium_desturbance[$request->equilibrium_desturbance] : null;
        $this->setScore($equilibrium_desturbance_data);

        /*Conjunctival Redness*/
        $conjunctival_redness = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $conjunctival_redness_data = isset($conjunctival_redness[$request->conjunctival_redness]) ? $conjunctival_redness[$request->conjunctival_redness] : null;
        $this->setScore($conjunctival_redness_data);

        /*Nausea*/
        $nausea = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $nausea_data = isset($nausea[$request->nausea]) ? $nausea[$request->nausea] : null;
        $this->setScore($nausea_data);

        /*Neck Stiffness*/
        $neck_stiffness = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 1, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $neck_stiffness_data = isset($neck_stiffness[$request->neck_stiffness]) ? $neck_stiffness[$request->neck_stiffness] : null;
        $this->setScore($neck_stiffness_data);

        /*restricted neck and sholder movements*/
        $sholder_movements = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $sholder_movements_data = isset($sholder_movements[$request->sholder_movements]) ? $sholder_movements[$request->sholder_movements] : null;
        $this->setScore($sholder_movements_data);
        
        /*Reduced hearing (hypoacusis)*/
        $hypoacusis = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $hypoacusis_data = isset($hypoacusis[$request->hypoacusis]) ? $hypoacusis[$request->hypoacusis] : null;
        $this->setScore($hypoacusis_data);

        /*Ringing in the ears (Tinnitus)*/
        $tinnitus = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $tinnitus_data = isset($tinnitus[$request->tinnitus]) ? $tinnitus[$request->tinnitus] : null;
        $this->setScore($tinnitus_data);

        /*Tired eyes (Astenopia)*/
        $astenopia = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $astenopia_data = isset($astenopia[$request->astenopia]) ? $astenopia[$request->astenopia] : null;
        $this->setScore($astenopia_data);

        /*Eyes sensitive to light(Photophobia)*/
        $photophobia = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 1, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $photophobia_data = isset($photophobia[$request->photophobia]) ? $photophobia[$request->photophobia] : null;
        $this->setScore($astenopia_data);

        /*Loss of smell (Hyposmia)*/
        $hyposmia = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
        ];
        $hyposmia_data = isset($hyposmia[$request->hyposmia]) ? $hyposmia[$request->hyposmia] : null;
        $this->setScore($hyposmia_data);

        /*Dull pain in and around jaws when eating. (Jaw Claudation)*/
        $jaw_claudation = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $jaw_claudationa_data = isset($jaw_claudation[$request->jaw_claudation]) ? $jaw_claudation[$request->jaw_claudation] : null;
        $this->setScore($jaw_claudationa_data);

        /*Jaw Locking, Restricted Jaw Movement, Jaw Noise*/
        $jaw_locking = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 1],
        ];
        $jaw_locking_data = isset($jaw_locking[$request->jaw_locking]) ? $jaw_locking[$request->jaw_locking] : null;
        $this->setScore($jaw_locking_data);

        /*Jaw Tenderness*/
        $jaw_tenderness = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0],
        ];
        $jaw_tenderness_data = isset($jaw_tenderness[$request->jaw_tenderness]) ? $jaw_tenderness[$request->jaw_tenderness] : null;
        $this->setScore($jaw_tenderness_data);

        /*Grinding of teeth (Bruxism)*/
        $grinding_of_teeth_bruxism = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 1],
        ];
        $grinding_of_teeth_bruxism_data = isset($grinding_of_teeth_bruxism[$request->grinding_of_teeth_bruxism]) ? $grinding_of_teeth_bruxism[$request->grinding_of_teeth_bruxism] : null;
        $this->setScore($grinding_of_teeth_bruxism_data);

        /*Involuntary Muscle contractions (Focal dystonia)*/
        $focal_dystonia = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 1, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $focal_dystonia_data = isset($focal_dystonia[$request->focal_dystonia]) ? $focal_dystonia[$request->focal_dystonia] : null;
        $this->setScore($focal_dystonia_data);

        /*Pain and stiffness in multiple muscles (Poly myalgia Rheumatica)*/
        $poly_myalgia_rheumatica = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $poly_myalgia_rheumatica_data = isset($poly_myalgia_rheumatica[$request->poly_myalgia_rheumatica]) ? $poly_myalgia_rheumatica[$request->poly_myalgia_rheumatica] : null;
        $this->setScore($poly_myalgia_rheumatica_data);

        /*Enlarged, Tortuous and Tender Temporal artery*/
        $enlarged_tortuous = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $enlarged_tortuous_data = isset($enlarged_tortuous[$request->enlarged_tortuous]) ? $enlarged_tortuous[$request->enlarged_tortuous] : null;
        $this->setScore($enlarged_tortuous_data);

        /*Spesific sholder pain*/
        $spesific_sholder_pain = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 1, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];

        $spesific_sholder_pain_data = isset($spesific_sholder_pain[$request->spesific_sholder_pain]) ? $spesific_sholder_pain[$request->spesific_sholder_pain] : null;
        $this->setScore($spesific_sholder_pain_data);

        /*Diplopia (double vision)*/
        $diplopia = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $diplopia_data = isset($diplopia[$request->diplopia]) ? $diplopia[$request->diplopia] : null;
        $this->setScore($diplopia_data);

        /*purulent Nasal Secretion*/
        $purulent_nasal = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
        ];
        $purulent_nasal_data = isset($purulent_nasal[$request->purulent_nasal]) ? $purulent_nasal[$request->purulent_nasal] : null;
        $this->setScore($purulent_nasal_data);

        /*Nasal Obstruction*/
        $nasal_obstruction = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
        ];
        $nasal_obstruction_data = isset($nasal_obstruction[$request->nasal_obstruction]) ? $nasal_obstruction[$request->nasal_obstruction] : null;
        $this->setScore($nasal_obstruction_data);

        /*Fever*/
        $fever = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 1, 'p' => 1, 'q' => 0, 'r' => 0],
        ];
        $fever_data = isset($fever[$request->fever]) ? $fever[$request->fever] : null;
        $this->setScore($fever_data);

        /*Blurred Vision*/
        $blurred_vision = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 1, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 1, 'o' => 1, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $blurred_vision_data = isset($blurred_vision[$request->blurred_vision]) ? $blurred_vision[$request->blurred_vision] : null;
        $this->setScore($blurred_vision_data);

        /*Daytime sleepiness*/
        $daytime_sleepiness = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $daytime_sleepiness_data = isset($daytime_sleepiness[$request->daytime_sleepiness]) ? $daytime_sleepiness[$request->daytime_sleepiness] : null;
        $this->setScore($daytime_sleepiness_data);

        /*Pupils big, and eyelid hanging low (Horners syndrome)*/
        $horners_syndrome = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $horners_syndrome_data = isset($horners_syndrome[$request->horners_syndrome]) ? $horners_syndrome[$request->horners_syndrome] : null;
        $this->setScore($horners_syndrome_data);

        /*Papillodema*/
        $papillodema = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $papillodema_data = isset($papillodema[$request->papillodema]) ? $papillodema[$request->papillodema] : null;
        $this->setScore($papillodema_data);

        /*Black outs (Transcient Ischemic Attack)*/
        $black_outs = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 1, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $black_outs_data = isset($black_outs[$request->black_outs]) ? $black_outs[$request->black_outs] : null;
        $this->setScore($black_outs_data);

        /*leaky nose or very runny (csf leak)*/
        $leaky_nose = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $leaky_nose_data = isset($leaky_nose[$request->leaky_nose]) ? $leaky_nose[$request->leaky_nose] : null;
        $this->setScore($leaky_nose_data);

        /*Vommiting*/
        $vommiting = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 1, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 1, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $vommiting_data = isset($vommiting[$request->vommiting]) ? $vommiting[$request->vommiting] : null;
        $this->setScore($vommiting_data);

        /*depressed consciousness*/
        $depressed_consciousness = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 1, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $depressed_consciousness_data = isset($depressed_consciousness[$request->depressed_consciousness]) ? $depressed_consciousness[$request->depressed_consciousness] : null;
        $this->setScore($depressed_consciousness_data);

        /*Question 12: What makes the head ache worse?*/
        $valsalva_maneuvre = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $valsalva_maneuvre_data = isset($valsalva_maneuvre[$request->valsalva_maneuvre]) ? $valsalva_maneuvre[$request->valsalva_maneuvre] : null;
        $this->setScore($valsalva_maneuvre_data);

        /*Bending the head FW*/
        $bending_the_head_fw = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 1, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
        ];
        $bending_the_head_fw_data = isset($bending_the_head_fw[$request->bending_the_head_fw]) ? $bending_the_head_fw[$request->bending_the_head_fw] : null;
        $this->setScore($bending_the_head_fw_data);

        /*Bending head back wards (Retroflexion)*/
        $retroflexion = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $retroflexion_data = isset($retroflexion[$request->retroflexion]) ? $retroflexion[$request->retroflexion] : null;
        $this->setScore($retroflexion_data);

        /*Head turning*/
        $head_turning = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
        ];
        $head_turning_data = isset($head_turning[$request->head_turning]) ? $head_turning[$request->head_turning] : null;
        $this->setScore($head_turning_data);

        /*Swallowing*/
        $swallowing = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $swallowing_data = isset($swallowing[$request->swallowing]) ? $swallowing[$request->swallowing] : null;
        $this->setScore($swallowing_data);

        /*Coughing, Strain, Sexual activity*/
        $coughing_strain_sexual_activity = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 1, 'q' => 0, 'r' => 0],
        ];
        $coughing_strain_sexual_activity_data = isset($coughing_strain_sexual_activity[$request->coughing_strain_sexual_activity]) ? $coughing_strain_sexual_activity[$request->coughing_strain_sexual_activity] : null;
        $this->setScore($coughing_strain_sexual_activity_data);

        /*Upright Position*/
        $upright_position = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 1, 'j' => 0, 'k' => 1, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $upright_position_data = isset($upright_position[$request->upright_position]) ? $upright_position[$request->upright_position] : null;
        $this->setScore($upright_position_data);

        /*Palpitation of muscles around jaws ( Mastication Muscles)*/
        $mastication_muscles = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 1],
        ];

        $mastication_muscles_data = isset($mastication_muscles[$request->mastication_muscles]) ? $mastication_muscles[$request->mastication_muscles] : null;
        $this->setScore($mastication_muscles_data);

        /*Chewing (Mastication)*/
        $chewing_mastication = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 1],
        ];

        $chewing_mastication_data = isset($chewing_mastication[$request->chewing_mastication]) ? $chewing_mastication[$request->chewing_mastication] : null;
        $this->setScore($chewing_mastication_data);

        /*Head Movement*/
        $head_movement = [
            '0' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            '1' => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 1, 'r' => 0],
        ];

        $head_movement_data = isset($head_movement[$request->head_movement]) ? $head_movement[$request->head_movement] : null;
        $this->setScore($head_movement_data);

        /*Question 13: What makes the head ache better?*/
        $question_13 = [
            'lying_down'    => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 1, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
            'standing_up'   => ['a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0, 'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0, 'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0],
        ];
        $question_13_data = isset($question_13[$request->question_13]) ? $question_13[$request->question_13] : null;
        $this->setScore($question_13_data);

        $results = [
            'Post Traumatic Head Ache'                                  => isset(Session::get('score')['a']) ? Session::get('score')['a'] : null,
            'Whiplash'                                                  => isset(Session::get('score')['b']) ? Session::get('score')['b'] : null,
            'Head Ache in Acute Stroke'                                 => isset(Session::get('score')['c']) ? Session::get('score')['c'] : null,
            'Giant Cell Arteritis'                                      => isset(Session::get('score')['d']) ? Session::get('score')['d'] : null,
            'Arterial Desection'                                        => isset(Session::get('score')['e']) ? Session::get('score')['e'] : null,
            'Hydrocephalus and Intra Crania Tumor'                      => isset(Session::get('score')['f']) ? Session::get('score')['f'] : null,
            'Pseudotumor Cerebri/Idiopathic Intracanial Hypertention'   => isset(Session::get('score')['g']) ? Session::get('score')['g'] : null,
            'LOW Serebrospinal Fluid Pressure'                          => isset(Session::get('score')['h']) ? Session::get('score')['h'] : null,
            'Sleep Apnea Syndrome'                                      => isset(Session::get('score')['i']) ? Session::get('score')['i'] : null,
            'Cervicogenig Head Ache due to trauma, tumors and lesions ' => isset(Session::get('score')['j']) ? Session::get('score')['j'] : null,
            'Retropharyngial Tendonitis (rare)'                         => isset(Session::get('score')['k']) ? Session::get('score')['k'] : null,
            'Focal Cervical Dystonia'                                   => isset(Session::get('score')['l']) ? Session::get('score')['l'] : null,
            'Glaucoma'                                                  => isset(Session::get('score')['m']) ? Session::get('score')['m'] : null,
            'Inflamatory Disorder'                                      => isset(Session::get('score')['n']) ? Session::get('score')['n'] : null,
            'Refractive Error/Muscle Imbalance'                         => isset(Session::get('score')['o']) ? Session::get('score')['o'] : null,
            'Acute Sinusitus'                                           => isset(Session::get('score')['p']) ? Session::get('score')['p'] : null,
            'Arthrogenous (joint)'                                      => isset(Session::get('score')['q']) ? Session::get('score')['q'] : null,
            'Myogenous (Muscular)'                                      => isset(Session::get('score')['r']) ? Session::get('score')['r'] : null,
        ];

        $score = 0;
        if(Session::has('score') && !empty(Session::get('score'))){
            foreach(Session::get('score') as $keys => $values){
                $score = (($score) + ($values));
            }
        }

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

    public function sendMail($score, $results){
        Mail::send('survey_results', ['results'=> $results,'score'=>$score ], function ($message) {
            $message->from('info@admin.com', 'Headache');
            $message->to("gert@gsdm.co.za")->subject('New Form Submitted: '.date("Y-m-d"));
        }); 
    }
}
