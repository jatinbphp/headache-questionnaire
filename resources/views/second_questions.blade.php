@extends('app')
@section('content')
<style type="text/css">
    .score_section_hd{
        writing-mode: vertical-rl;
        white-space:nowrap;
        transform:scale(-1);
    }
    .section_header, .score_section_hd{
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      vertical-align: bottom; 
    }
    .middle_column{
        writing-mode: vertical-rl;
        white-space:nowrap;
        transform:scale(-1);
        vertical-align: middle;
        text-align: center; 
    }
    .text_rotate{
        writing-mode: vertical-rl;
        white-space:nowrap;
        transform:scale(-1);
        vertical-align: middle;
        text-align: center; 
    }
</style>
<div class="content-wrapper">
    <section class="container content-header d-none">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="text-center">Primary Headache Questionnaire</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="container content">        
        <div class="card card-info p-3 m-3">

            <div class="alert alert-danger" id="errorDivision" style="display: none;">
                <strong>There were some errors:</strong>
                <ul>
                    
                </ul>
            </div>

            {!! Form::open(['method'=>'POST','id' => 'secondForm', 'class' => 'form-horizontal']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive fixed-table-body">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                {{-- first row --}}
                                <tr class="table_header">
                                    <td class="section_header border-0" style="width: 35%">
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td> Question</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td class="section_header border-0" style="width: 15%">
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td> Answer</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td class="section_header border-0" style="width: 5%"></td>
                                    
                                    <td class="section_header border-0" style="width: 45%;">
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td class="bg-warning"> Symptom/type</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- second row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 200px;"><td> Question 1: Are you suffering of any of the following?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="family_history_of_h_a" value="1"> Yes
                                                        <input type="radio" name="family_history_of_h_a" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="past_medical_or_psychiatric_disease" value="1"> Yes
                                                        <input type="radio" name="past_medical_or_psychiatric_disease" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="trauma_to_the_head_neck_face" value="1"> Yes
                                                        <input type="radio" name="trauma_to_the_head_neck_face" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="substance_abuce_inc_coffee_tobacco_drugs_analgesics" value="1"> Yes
                                                        <input type="radio" name="substance_abuce_inc_coffee_tobacco_drugs_analgesics" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="physically_or_emotional_stresfull_surcumstance" value="1"> Yes
                                                        <input type="radio" name="physically_or_emotional_stresfull_surcumstance" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr class="third_column" style="height: 200px;"><td class="middle_column bg-warning"> Case History</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Family History of H/A</td></tr>
                                                <tr style="height: 40px;"><td>Past medical or psychiatric disease</td></tr>
                                                <tr style="height: 40px;"><td>Trauma to the head/Neck/face</td></tr>
                                                <tr style="height: 40px;"><td>Substance abuce inc. Coffee, tobacco, Drugs, Analgesics</td></tr>
                                                <tr style="height: 40px;"><td>Physically or Emotional stresfull surcumstance</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- third row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 280px;"><td> Question 2: At what age did your head ache start?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 280px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_2" name="question_2">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="childhood">Childhood</option>
                                                                <option value="adolescence">Adolescence</option>
                                                                <option value="in_my_20_s">In my 20's</option>
                                                                <option value="in_my_30_s">In my 30's</option>
                                                                <option value="in_my_40_s">In my 40's</option>
                                                                <option value="in_my_50_s">In my 50's</option>
                                                                <option value="in_and_after_my_60_s">In and after my 60's</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="third_column">
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 280px;"><td class="middle_column bg-warning"> Age of Onset</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Childhood</td></tr>
                                                <tr style="height: 40px;"><td>Adolescence</td></tr>
                                                <tr style="height: 40px;"><td>In my 20's</td></tr>
                                                <tr style="height: 40px;"><td>In my 30's</td></tr>
                                                <tr style="height: 40px;"><td>In my 40's</td></tr>
                                                <tr style="height: 40px;"><td>In my 50's</td></tr>
                                                <tr style="height: 40px;"><td>In and after my 60's</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- forth row --}}
                                <tr>
                                    <td colspan="4">
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr class="border-bottom-0" style="height: 60px;"><td class=""> Question 3: Is the pain in generalized area of your head, or difficult to pinpoint, or is the pain more on asspesific part of your head, or  easy to point to?</td></tr>
                                                <tr class="border-top-0" style="height: 40px;">
                                                    <td class="">
                                                        <input type="radio" name="question_three_options" value="generalized" checked onchange="handleChange(this)"> Generalized &nbsp;
                                                        <input type="radio" name="question_three_options" value="specific" onchange="handleChange(this)"> Specific  
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- fifth row --}}
                                <tr id="generalized_row">
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 320px;"><td>Question 3 A (Generalized): In which part of your head is the pain?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 320px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_3_a" name="question_3_a">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="forehead_anterior">Forehead (Anterior)</option>
                                                                <option value="back_of_the_head_posterior">Back of the head (Posterior)</option>
                                                                <option value="all_over">all over</option>
                                                                <option value="top_and_middle_of_the_head_above_the_ear_parietal">Top and middle of the head, above the ear? (Parietal)</option>
                                                                <option value="right_at_the_back_at_the_notch_of_the_head_occipital_nuchal">Right at the back at the notch of the head(Occipital Nuchal )</option>
                                                                <option value="on_the_side_and_temple_of_the_head_temporal">On the side and temple of the head? (Temporal)</option>
                                                                <option value="from_the_back_of_the_head_to_behind_the_eyes_oculo_temporal_occipital">From the back of the head, to behind the eyes? (Oculo-temporal-occipital)</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td class="third_column" rowspan="2"> 
                                        <table class="table table-sm table-bordered" style="height: 530px">
                                            <tbody>
                                                <tr><td class="middle_column bg-warning"> Location</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td class="text_rotate bg-warning" rowspan="7" style="width: 5%">General</td>
                                                    <td style="width: 95%">Forehead (Anterior)</td>
                                                </tr>
                                                <tr style="height: 40px;"><td>Back of the head (Posterior)</td></tr>
                                                <tr style="height: 40px;"><td>all over</td></tr>
                                                <tr style="height: 40px;"><td>Top and middle of the head, above the ear? (Parietal)</td></tr>
                                                <tr style="height: 60px;"><td>Right at the back at the notch of the head(Occipital Nuchal )</td></tr>
                                                <tr style="height: 40px;"><td>On the side and temple of the head? (Temporal)</td></tr>
                                                <tr style="height: 60px;"><td>From the back of the head, to behind the eyes? (Oculo-temporal-occipital)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- sixth row --}}
                                <tr id="specific_row" style="display: none;">
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 340px;"><td> Question 3 B: In which part of your head is the pain?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 340px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_3_b" id="question_3_b">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="back_of_the_head_occipital">Back of the head (Occipital)</option>
                                                                <option value="cheek_face_chin">Cheek, face or chin</option>
                                                                <option value="behind_ear">Behind Ear</option>
                                                                <option value="base_of_tongue_tonsillar_fossae">Base of tongue/Tonsillar Fossae</option>
                                                                <option value="behind_the_eyes_periorbital">Behind the eyes (Periorbital)</option>
                                                                <option value="right_at_the_back_notch_of_the_head_occipital_nuchal">Right at the back notch of the head (Occipital/Nuchal)</option>
                                                                <option value="at_the_temple_temporal">At the Temple (Temporal)</option>
                                                                <option value="at_the_temple_and_behind_the_eye_oculofronto_temporal">At the temple and behind the eye (Oculo-fronto Temporal)</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td class="third_column" rowspan="2"> 
                                        <table class="table table-sm table-bordered" style="height: 550px">
                                            <tbody>
                                                <tr><td class="middle_column bg-warning"> Location</td></tr>
                                            </tbody>
                                        </table>
                                    </td>  
                                   
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td class="text_rotate" rowspan="8" style="width: 5%">Specific</td>
                                                    <td style="width: 95%">Back of the head (Occipital)</td>
                                                </tr>
                                                <tr style="height: 40px;"><td>Cheek, face or chin</td></tr>
                                                <tr style="height: 40px;"><td>Behind Ear</td></tr>
                                                <tr style="height: 40px;"><td>Base of toungue/Tonsillar Fossae</td></tr>
                                                <tr style="height: 40px;"><td>Behind the eyes (Periorbital)</td></tr>
                                                <tr style="height: 40px;"><td>Right at the back notch of the head (Occipital /Nuchal)</td></tr>
                                                <tr style="height: 40px;"><td>At the Temple (Temporal)</td></tr>
                                                <tr style="height: 60px;"><td>At the temple and behind the eye (Oculo-fronto Temporal)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- seventh row --}}
                                 <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 180px;"><td>Question 4: On which side of the head is the head ache?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 180px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_4" id="question_4">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="mostly_on_one_side">Mostly on one side (Unilateral)</option>
                                                                <option value="both_sides">Both sides (Bilateral)</option>
                                                                <option value="always_at_the_same_side_laterally_fixed">Always at the same side (Laterally Fixed)</option>
                                                                <option value="both_sides_but_one_side_is_worse_latirality_concommitant">Both sides but one side is worse (Latirality Concommitant)</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                   
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td class="text_rotate" rowspan="8" style="width: 5%">Laterality</td>
                                                    <td style="width: 95%">Mostly on one side (Unilateral)</td>
                                                </tr>
                                                <tr style="height: 40px;"><td>Both sides (Bilateral)</td></tr>
                                                <tr style="height: 40px;"><td>Always at the same side (Laterally Fixed)</td></tr>
                                                <tr style="height: 60px;"><td>Both sides but one side is worse (Latirality concommitant)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- eight row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 320px;"><td> Question 5: How long does the pain last?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 320px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_5" id="question_5">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="1_second">1 second</option>
                                                                <option value="10_seconds_followed_by_refractory_period">10 seconds followed by refractory period</option>
                                                                <option value="15_minutes_to_3_hours">15 minutes to 3 hours</option>
                                                                <option value="more_than_30_minutes_but_less_than_4_hours">More than 30 minutes but less than 4 hours</option>
                                                                <option value="4_hours_to_more_or_less_24_hours">4 hours to more or less 24 hours</option>
                                                                <option value="much_longer_than_24_hours">Much longer than 24 hours</option>
                                                                <option value="comes_and_goes">Comes and goes</option>
                                                                <option value="persistent">Persistent</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                     <td class="third_column"> 
                                        <table class="table table-sm table-bordered" style="height: 320px">
                                            <tbody>
                                                <tr><td class="middle_column bg-warning"> Duration</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                   
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>1 second</td></tr>
                                                <tr style="height: 40px;"><td>10 secconds followed by refractory period</td></tr>
                                                <tr style="height: 40px;"><td>15 minutes to 3 hours</td></tr>
                                                <tr style="height: 40px;"><td>More than 30 min but less than 4 hours</td></tr>
                                                <tr style="height: 40px;"><td>4 hours to more or less 24 hours</td></tr>
                                                <tr style="height: 40px;"><td>Much longer than 24 hours.</td></tr>
                                                <tr style="height: 40px;"><td>Comes and goes</td></tr>
                                                <tr style="height: 40px;"><td>Persistant</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- nineth row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 160px;"><td> Question 6: How intesnse or hw much is the pain hurting?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 160px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_6" id="question_6">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="mild_0_3_on_visual_analogue_scale">Mild (0-3 on Visual Analogue Scale)</option>
                                                                <option value="moderate_4_6_on_visual_analogue_scale">Moderate (4-6 on Visual Analogue Scale)</option>
                                                                <option value="severe_7_9_on_visual_analogue_scale">Severe (7-9 on Visual Analogue Scale)</option>
                                                                <option value="excruciating_10_on_visual_analogue_scale">Excruciating (10 on Visual Analogue Scale)</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                     <td class="third_column" rowspan="3"> 
                                        <table class="table table-sm table-bordered" style="height: 632px">
                                            <tbody>
                                                <tr><td class="middle_column bg-warning"> Caracter and intensity of Pain</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                   
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td rowspan="4" class="text_rotate" style="width: 5%;">Intensity</td>
                                                    <td style="width: 95%">mild (0-3 on Visual Analogue scale)</td>
                                                </tr>
                                                <tr style="height: 40px;"><td>moderate (4-6 on Visual Analogue Scale)</td></tr>
                                                <tr style="height: 40px;"><td>severe (7 - 9 on Visual Analogue Scale)</td></tr>
                                                <tr style="height: 40px;"><td>exrutiating (10 on Visual Analogue Scale)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- tenth row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 180px;"><td> Question 7: From when the pain is starting till it is on its worst, which statement is most accurate?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 180px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_7" id="question_7">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="the_pain_develops_within_a_minute_or_can_even_feel_like_an_explosion_of_pain_hyper_accute_or_explosive">The pain develops within a minute or can even feel like an explosion of pain (Hyper-acute or Explosive)</option>
                                                                <option value="quick_progression_accute">Quick progression (Acute)</option>
                                                                <option value="fast_progression_e_g_about_an_hour_or_two">Fast progression, e.g., about an hour or two</option>
                                                                <option value="it_takes_long_e_g_several_hours_slow_progression">It takes long, e.g., several hours (Slow Progression)</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 60px;">
                                                    <td style="width: 5%" rowspan="4" class="text_rotate">Speed of Progression</td>
                                                    <td style="width: 95%">The pain develops within a minute or can even feel like an explosion of pain. (Hyper-accute or Explosive)</td>
                                                </tr>
                                                <tr style="height: 40px;"><td>Quick progression (Accute)</td></tr>
                                                <tr style="height: 40px;"><td>Fast progression e.g. about an hour or two.</td></tr>
                                                <tr style="height: 40px;"><td>It takes long, e.g. several hours (Slow Progression)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- eleventh row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 240px;"><td> Question 8: Which statement describes the feeling of the pain the best?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 240px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_8" id="question_8">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="boring_pain_like_a_drill">Boring pain, like a drill</option>
                                                                <option value="throbing_pain_pulsing_pain">Throbing pain/Pulsing Pain</option>
                                                                <option value="pressing_pain">Pressing Pain.</option>
                                                                <option value="needle_like_pain">Needle like Pain</option>
                                                                <option value="electric_shock_pain">Electric shock pain</option>
                                                                <option value="very_unplessant_feeling_of_eyes_being_pushed_out">Very Unplessant feeling of eyes being pushed out</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Boring pain, like a drill</td></tr>
                                                <tr style="height: 40px;"><td>Throbing pain/Pulsing Pain</td></tr>
                                                <tr style="height: 40px;"><td>Pressing Pain.</td></tr>
                                                <tr style="height: 40px;"><td>Needle like Pain</td></tr>
                                                <tr style="height: 40px;"><td>Electric shock pain</td></tr>
                                                <tr style="height: 40px;"><td>Very Unplessant feeling of eyes being pushed out</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- twelveth row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 545px;"><td> Question 9: Are you experiencing any of the following at the same time of the head ache?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 545px;">
                                                    <td>
                                                        <table class="table table-sm table-bordered">
                                                            <tbody>
                                                                <tr style="height: 80px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="red_eyes_crying_eyes_and_or_runny_nose"> Yes
                                                                        <input type="radio" value="0" name="red_eyes_crying_eyes_and_or_runny_nose" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="nausea_vomiting"> Yes
                                                                        <input type="radio" value="0" name="nausea_vomiting" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 60px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="you_want_to_avoid_bright_light_or_loud_sounds"> Yes
                                                                        <input type="radio" value="0" name="you_want_to_avoid_bright_light_or_loud_sounds" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 60px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="visual_signs_body_parts_becoming_paraletic"> Yes
                                                                        <input type="radio" value="0" name="visual_signs_body_parts_becoming_paraletic" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="numbness_of_toungue"> Yes
                                                                        <input type="radio" value="0" name="numbness_of_toungue" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="depression"> Yes
                                                                        <input type="radio" value="0" name="depression" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="large_pupils_and_or_eyelid_hanging"> Yes
                                                                        <input type="radio" value="0" name="large_pupils_and_or_eyelid_hanging" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="restlessness_and_irritation"> Yes
                                                                        <input type="radio" value="0" name="restlessness_and_irritation" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="other"> Yes
                                                                        <input type="radio" value="0" name="other" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="tenderness_of_the_scalp"> Yes
                                                                        <input type="radio" value="0" name="tenderness_of_the_scalp" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="none"> Yes
                                                                        <input type="radio" value="0" name="none" checked> No  
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr class="third_column" style="height: 545px;"><td class="middle_column bg-warning"> Associated Phenomina</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;"><td>Red eyes, Crying Eyes, and/or Runny nose <br> (Autonomic Ass: Conjunctival Injection, Lacrimation, Nasal Congestion, Rhhinorhea) </td></tr>
                                                <tr style="height: 40px;"><td>Nausea/Vomiting</td></tr>
                                                <tr style="height: 60px;"><td>You want to avoid bright light or loud sounds (Photophobia, Phonophobia)</td></tr>
                                                <tr style="height: 60px;"><td>Visual Signs, Body parts becoming paraletic (Focal Neurological Phenomina: Aura, Paresthesia, aphasia)</td></tr>
                                                <tr style="height: 40px;"><td>Numbness of toungue</td></tr>
                                                <tr style="height: 40px;"><td>Depression</td></tr>
                                                <tr style="height: 40px;"><td>Large Pupils and/or  Eyelid hanging (Miosis and/or  Ptosis)</td></tr>
                                                <tr style="height: 40px;"><td>Restlessness and Irritation (agitation/irritation)</td></tr>
                                                <tr style="height: 40px;"><td>Other</td></tr>
                                                <tr style="height: 40px;"><td>Tenderness of the Scalp (Pericranial Tenderness)</td></tr>
                                                <tr style="height: 65px;"><td>None</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- thirteenth row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 825px;"><td> Question 10: is any of the following activating the head ache, or making the head ache worse?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 825px;">
                                                    <td>
                                                        <table class="table table-sm table-bordered">
                                                            <tbody>
                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="normal_physical_activity"> Yes
                                                                        <input type="radio" value="0" name="normal_physical_activity" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="menstrual_stress" > Yes
                                                                        <input type="radio" value="0" name="menstrual_stress" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="whether_changes"> Yes
                                                                        <input type="radio" value="0" name="whether_changes" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="certain_food_or_drinks"> Yes
                                                                        <input type="radio" value="0" name="certain_food_or_drinks" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="oversleeping"> Yes
                                                                        <input type="radio" value="0" name="oversleeping" checked> No  
                                                                    </td>
                                                                </tr>

                                                                 <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="under_sleeping"> Yes
                                                                        <input type="radio" value="0" name="under_sleeping" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="vasoactive_substance_e_g_alcohol"> Yes
                                                                        <input type="radio" value="0" name="vasoactive_substance_e_g_alcohol" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="neck_movements"> Yes
                                                                        <input type="radio" value="0" name="neck_movements" checked> No  
                                                                    </td>
                                                                </tr>

                                                                 <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="jaw_movements"> Yes
                                                                        <input type="radio" value="0" name="jaw_movements" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="pharingeal_activity_talking_swallowing"> Yes
                                                                        <input type="radio" value="0" name="pharingeal_activity_talking_swallowing" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="sex_and_exertion"> Yes
                                                                        <input type="radio" value="0" name="sex_and_exertion" checked> No  
                                                                    </td>
                                                                </tr>

                                                                 <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="cough"> Yes
                                                                        <input type="radio" value="0" name="cough" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="sudden_turn_of_head"> Yes
                                                                        <input type="radio" value="0" name="sudden_turn_of_head" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="strain"> Yes
                                                                        <input type="radio" value="0" name="strain" checked> No  
                                                                    </td>
                                                                </tr>

                                                                 <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="dental_procedure_or_minor_facial_trauma"> Yes
                                                                        <input type="radio" value="0" name="dental_procedure_or_minor_facial_trauma" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="standing_up"> Yes
                                                                        <input type="radio" value="0" name="standing_up" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="persistant_ackward_neck_position_e_g_reading_or_sleeping"> Yes
                                                                        <input type="radio" value="0" name="persistant_ackward_neck_position_e_g_reading_or_sleeping" checked> No  
                                                                    </td>
                                                                </tr>

                                                                 <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="laying_down"> Yes
                                                                        <input type="radio" value="0" name="laying_down" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="worsened_by_head_movement"> Yes
                                                                        <input type="radio" value="0" name="worsened_by_head_movement" checked> No  
                                                                    </td>
                                                                </tr>

                                                                <tr style="height: 40px;">
                                                                    <td>
                                                                        <input type="radio" value="1" name="mechanical_stimuli"> Yes
                                                                        <input type="radio" value="0" name="mechanical_stimuli" checked> No  
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr class="third_column" style="height: 825px;"><td class="middle_column bg-warning"> Trigesr and Agrivations</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Normal Physical Activity</td></tr>
                                                <tr style="height: 40px;"><td>Menstrual Stress</td></tr>
                                                <tr style="height: 40px;"><td>Whether changes</td></tr>
                                                <tr style="height: 40px;"><td>certain food or drinks</td></tr>
                                                <tr style="height: 40px;"><td>Oversleeping</td></tr>
                                                <tr style="height: 40px;"><td>Under sleeping</td></tr>
                                                <tr style="height: 40px;"><td>Vasoactive Substance, e.g. Alcohol</td></tr>
                                                <tr style="height: 40px;"><td>Neck Movements</td></tr>
                                                <tr style="height: 40px;"><td>Jaw Movements</td></tr>
                                                <tr style="height: 40px;"><td>Pharingeal activity: Talking, Swallowing</td></tr>
                                                <tr style="height: 40px;"><td>Sex and Exertion</td></tr>
                                                <tr style="height: 40px;"><td>Cough</td></tr>
                                                <tr style="height: 40px;"><td>Sudden Turn of head</td></tr>
                                                <tr style="height: 40px;"><td>Strain</td></tr>
                                                <tr style="height: 40px;"><td>Dental Procedure or Minor Facial Trauma</td></tr>
                                                <tr style="height: 40px;"><td>Standing up</td></tr>
                                                <tr style="height: 40px;"><td>Persistant Ackward Neck Position e.g. reading or sleeping</td></tr>
                                                <tr style="height: 40px;"><td>Laying Down</td></tr>
                                                <tr style="height: 40px;"><td>Worsened by Head Movement.</td></tr>
                                                <tr style="height: 65px;"><td>Mechanical stimuli</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- forteenth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 140px;"><td> Question 11: Which Statement is most accurate?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 140px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_11" id="question_11">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="the_head_ache_awokes_me_from_sleep">The Head Ache Awokes me from sleep</option>
                                                                <option value="early_morning_when_i_am_sleeping">The head ache comes during night or early morning when I am sleeping (Nocturnal or early morning onset)</option>
                                                                <option value="the_head_aches_is_coming_during_daytime">The Head Aches is coming during Daytime</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="third_column">
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 140px;"><td class="middle_column bg-warning"> </td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td class="text_rotate" rowspan="3">Circadian Pattern</td>
                                                    <td>The Head Ache Awokes me from sleep</td>
                                                </tr>
                                                <tr style="height: 60px;"><td>The head ache comes during night or early morning when I am sleeping (Nocturnal or early morning onset)</td></tr>
                                                <tr style="height: 40px;"><td>The Head Aches is coming during Daytime</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- fifteenth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 120px;"><td> How often do you experience the head ache?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 120px;">
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="question_12" id="question_12">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="not_that_often_low">Not that often (low)</option>
                                                                <option value="sometimes_moderate">Sometimes (moderate)</option>
                                                                <option value="the_whole_time_high">The whole time (high)</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="third_column">
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 120px;"><td class="middle_column bg-warning"> </td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td class="text_rotate bg-warning" rowspan="3" style="width: 30%">incidence <br>or<br> chronicity</td>
                                                    <td style="width: 70%">Not that often (low)</td>
                                                </tr>
                                                <tr style="height: 40px;"><td>Sometimes (moderate)</td></tr>
                                                <tr style="height: 40px;"><td>The whole time (high)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="align-self-end">
                        <a href="{{ url('/') }}" type="button" class="btn btn-warning">Previous Page</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="align-self-end text-center">
                         <button type="submit" onclick="handleSubmit()" class="btn btn-primary">Calculate Score</button> 
                    </div>
                </div>

                <div class="col-4">
                    <div class="align-self-end float-end">
                        <a href="{{ url('/3') }}" type="button" class="btn btn-warning">Next Page</a>
                    </div>
                </div>
            </div>

            <div class="alert alert-success mt-3" id="success" style="display:none"> </div>

            {!! Form::close() !!}
        </div>
    </section>
</div>
@endsection
@section('jquery')
<script type="text/javascript">
function handleSubmit(){
    event.preventDefault();
    var user = '{{ session()->has('user') ? true : false }}';
    if(!user){
        var errorMsg = "<li>Please fill user details in the first questionnaire form</li>";
        $("#errorDivision ul").html(errorMsg);
        $("#errorDivision").css({"display": "block"});
        $(window).scrollTop(0);
        return false;
    }

    var formData = $("#secondForm").serialize();
    $.ajax({
        type: "POST", 
        url: "{{route('getSecondFormData')}}",
        data: formData,
        success: function (response) {
            $("#success").show();
            $("#errorDivision").css({"display": "none"});
            var msg = "You achieved a score of "+response.score+".<br>";
            msg += "<table class='table table-sm'>";
            msg += "  <tbody>";
            $.each(response.results, function (key, value) {
                msg +="<tr>";
                msg +="<td>"+key+"</td>";
                msg +="<td>"+value+"</td>";
                msg +="</tr>";
            });
            msg+= "</tbody>";
            msg+= "</table>"
            msg+="Please follow the link below for more info <a href='https://www.xzy.com' target='blank'>https://www.xzy.com</a>";
            $("#success").html(msg);
        },
        error: function (error) {
            $("#success").hide();
            $("#errorDivision").css({"display": "block"});
            console.error("Error:", error.responseJSON.errors);
            var errorMsg = "<br>";
            $.each(error.responseJSON.errors, function (key, value) {
                errorMsg += "<li>"+value+"</li>";
            });
            $("#errorDivision ul").html(errorMsg);
            $(window).scrollTop(0);
        }
    });
}    

function handleChange(event){
    var option = event.value;
    if(option === 'generalized'){
        $('#specific_row').css({"display": "none"});
        $('#generalized_row').css({"display": ""})
    }else{
        $('#generalized_row').css({"display": "none"});
        $('#specific_row').css({"display": ""})
    }
}
</script>
@endsection