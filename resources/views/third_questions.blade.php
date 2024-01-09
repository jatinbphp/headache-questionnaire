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
    <section class="container content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="text-center">Secondary Headache Questionnaire</h4>
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

            {!! Form::open(['method'=>'POST','id' => 'thirdForm', 'class' => 'form-horizontal']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive fixed-table-body">
                        <table class="table table-sm table-borderless">
                            <tbody>
                                {{-- table header --}}
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

                                {{--  first row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 360px;"><td> Question 1: What triggered or triggers your head ache?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 360px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_1" name="question_1">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="trauma">Trauma: with 7 days of Phisical Trauma to the head</option>
                                                                <option value="brain_heamorrhage">Brain Heamorrhage 2ndary to HTN, Strain often Subarachnoid Hemorage</option>
                                                                <option value="darkness">Darkness (Iridocorneal angle closure)</option>
                                                                <option value="instrainious_activity">Instrainious activity, emotional stress or sex</option>
                                                                <option value="neck_movement">Neck movement/Mechancal pressure on neck muscle?</option>
                                                                <option value="don_t_know">Don't know/Unknown/not clear</option>
                                                                <option value="heamoorhaging_into_the_arterial_wall">Heamoorhaging into the arterial wall due to "binign trauma". Strain, Coughing, Nose blow.</option>
                                                                <option value="event_that_leaks_icf">Event that leaks ICF, eg. Lumbar Puncture or CSF Vistula</option>
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
                                                <tr style="height: 360px;"><td class="middle_column"> Trigger</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Trauma: with 7 days of Phisical Trauma to the head</td></tr>
                                                <tr style="height: 60px;"><td>Brain Heamorrhage 2ndary to HTN, Strain often Subarachnoid Hemorage</td></tr>
                                                <tr style="height: 40px;"><td>Darkness (Iridocorneal angle closure)</td></tr>
                                                <tr style="height: 40px;"><td>Strainious activity, emotional stress or sex</td></tr>
                                                <tr style="height: 40px;"><td>Neck movement/Mechancal pressure on neck muscle?</td></tr>
                                                <tr style="height: 40px;"><td>Don't know/Unknown/not clear</td></tr>
                                                <tr style="height: 60px;"><td>Heamoorhaging into the arterial wall due to "binign trauma". Strain, Coughing, Nose blow.</td></tr>
                                                <tr style="height: 40px;"><td>Event that leaks ICF, eg. Lumbar Puncture or CSF Vistula</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- second row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 180px;"><td> Question 2: How long does it take from when you become aware of the head ache, until it is at its worst?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 180px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_2" name="question_2">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="hyper_acute_in_minutes">Hyper acute  - In minutes</option>
                                                                <option value="acute_within_an_hour">Acute within an hour , esp after strenous activity, acute stress, sex</option>
                                                                <option value="slow_onset_hours">Slow onset - hours</option>
                                                                <option value="progressive">Progressive</option>
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
                                                <tr style="height: 180px;"><td class="middle_column"> Speed of progression</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Hyper acute  - In minutes</td></tr>
                                                <tr style="height: 60px;"><td>Acute within an hour , esp after strenous activity, acute stress, sex</td></tr>
                                                <tr style="height: 40px;"><td>Slow onset - hours</td></tr>
                                                <tr style="height: 40px;"><td>Progressive</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- third row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 200px;"><td> Question 3: During a typical 24 hour period, when is the head ache most likely to occur?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 200px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_3" name="question_3">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="in_morning">In morning</option>
                                                                <option value="at_night_nocturnal">At night (Nocturnal)</option>
                                                                <option value="day_time">Day time</option>
                                                                <option value="all_the_time">all the time</option>
                                                                <option value="any_time">Any time</option>
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
                                                <tr style="height: 200px;"><td class="middle_column"> Circadian Pattern <br> (ask when worse)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>In morning</td></tr>
                                                <tr style="height: 40px;"><td>At night (Nocturnal)</td></tr>
                                                <tr style="height: 40px;"><td>Day time</td></tr>
                                                <tr style="height: 40px;"><td>All the time</td></tr>
                                                <tr style="height: 40px;"><td>Any time</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- fourth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 120px;"><td>Question 4: How old were you when the head ache started?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 120px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_4" name="question_4">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="between_2_and_99_years">Any age between 2 years and 99 years.</option>
                                                                <option value="midlife">Midlife</option>
                                                                <option value="after_age_60">After age 60</option>
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
                                                <tr style="height: 120px;"><td class="middle_column"> Age of Onset</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Any age between 2 years and 99 years.</td></tr>
                                                <tr style="height: 40px;"><td>Midlife</td></tr>
                                                <tr style="height: 40px;"><td>After age 60</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- fifth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 320px;"><td>Question 5: Where on your head is the head ache?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 320px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_5" name="question_5">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="neck">Neck</option>
                                                                <option value="face">Face</option>
                                                                <option value="whole_head">Face</option>
                                                                <option value="orbital_and_periorbital">Orbital and Periorbital</option>
                                                                <option value="in_and_around_sholder">IN and around sholder</option>
                                                                <option value="temple">Temple</option>
                                                                <option value="frontal">Frontal</option>
                                                                <option value="posterior">Posterior</option>
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
                                                <tr style="height: 320px;"><td class="middle_column"> Location</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Neck</td></tr>
                                                <tr style="height: 40px;"><td>Face</td></tr>
                                                <tr style="height: 40px;"><td>whole head</td></tr>
                                                <tr style="height: 40px;"><td>Orbital and Periorbital</td></tr>
                                                <tr style="height: 40px;"><td>IN and around sholder</td></tr>
                                                <tr style="height: 40px;"><td>Temple</td></tr>
                                                <tr style="height: 40px;"><td>Frontal</td></tr>
                                                <tr style="height: 40px;"><td>Posterior</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- sixth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;"><td>Question 6: On which side of the head is the head ache?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_6" name="question_6">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="both_sides_bilataral">Both Sides (Bilataral)</option>
                                                                <option value="only_left_or_right_side_unilateral">Only left or right side (Unilateral)</option>
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
                                                <tr style="height: 80px;"><td class="middle_column"> laterality</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Both Sides (Bilataral)</td></tr>
                                                <tr style="height: 40px;"><td>Only left or right side (Unilateral)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- seventh row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 90px;"><td>Question 7: Which describe your head ache the best?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 90px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_7" name="question_7">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="platonic">The Intensity is always more or less the same (platonic)</option>
                                                                <option value="progressive">Every time worse thant the previous time (progressive)</option>
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
                                                <tr style="height: 90px;"><td class="middle_column"> platonicity</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 45px;"><td>The Intensity is always more or less the same (platonic)</td></tr>
                                                <tr style="height: 45px;"><td>Every time worse thant the previous time (progressive)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- eighth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;"><td>Question 8: which describe your head ache the best?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_8" name="question_8">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="constant">It is there most of the time (Constant)</option>
                                                                <option value="intermittant">It comes and goes (intermittant)</option>
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
                                                <tr style="height: 80px;"><td class="middle_column">Temporal <br> Pattern</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>It is there most of the time (Constant)</td></tr>
                                                <tr style="height: 40px;"><td>It comes and goes (intermittant)</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- nineth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;"><td>Question 9: How severe is the pain?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_9" name="question_9">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="mild_head_ache">Mild Head Ache or Dyscomfort</option>
                                                                <option value="severe_pain">Severe Pain</option>
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
                                                <tr style="height: 80px;"><td class="middle_column">Intensity</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Mild  Head Ache or Dyscomfort</td></tr>
                                                <tr style="height: 40px;"><td>Severe Pain</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- tenth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 120px;"><td>Question 10: Which one describes the character of the pain most accurately?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 120px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_10" name="question_10">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="pulsatile_throbing">Pulsatile/throbing</option>
                                                                <option value="oppressive">Oppressive</option>
                                                                <option value="difuse_general">Difuse/General</option>
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
                                                <tr style="height: 120px;"><td class="middle_column">Character</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Pulsatile/throbing</td></tr>
                                                <tr style="height: 40px;"><td>oppressive</td></tr>
                                                <tr style="height: 40px;"><td>Difuse/General</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- eleventh row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 1560px;"><td> Question 11: Which of the following symptoms is most prominent during your head ache? Only tick those that is applciable</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="poor_memmory" value="1"> Yes
                                                        <input type="radio" name="poor_memmory" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 60px;">
                                                    <td>
                                                        <input type="radio" name="focal_neuro_signs" value="1"> Yes
                                                        <input type="radio" name="focal_neuro_signs" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="poor_concentration" value="1"> Yes
                                                        <input type="radio" name="poor_concentration" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="irritability" value="1"> Yes
                                                        <input type="radio" name="irritability" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="emotional_lability" value="1"> Yes
                                                        <input type="radio" name="emotional_lability" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="poor_sight" value="1"> Yes
                                                        <input type="radio" name="poor_sight" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="squinting" value="1"> Yes
                                                        <input type="radio" name="squinting" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="insomnia" value="1"> Yes
                                                        <input type="radio" name="insomnia" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="equilibrium_desturbance" value="1"> Yes
                                                        <input type="radio" name="equilibrium_desturbance" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="conjunctival_redness" value="1"> Yes
                                                        <input type="radio" name="conjunctival_redness" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="nausea" value="1"> Yes
                                                        <input type="radio" name="nausea" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="neck_stiffness" value="1"> Yes
                                                        <input type="radio" name="neck_stiffness" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="sholder_movements" value="1"> Yes
                                                        <input type="radio" name="sholder_movements" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="hypoacusis" value="1"> Yes
                                                        <input type="radio" name="hypoacusis" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="tinnitus" value="1"> Yes
                                                        <input type="radio" name="tinnitus" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="astenopia" value="1"> Yes
                                                        <input type="radio" name="astenopia" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="photophobia" value="1"> Yes
                                                        <input type="radio" name="photophobia" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="hyposmia" value="1"> Yes
                                                        <input type="radio" name="hyposmia" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="jaw_claudation" value="1"> Yes
                                                        <input type="radio" name="jaw_claudation" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="jaw_locking" value="1"> Yes
                                                        <input type="radio" name="jaw_locking" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="jaw_tenderness" value="1"> Yes
                                                        <input type="radio" name="jaw_tenderness" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="grinding_of_teeth_bruxism" value="1"> Yes
                                                        <input type="radio" name="grinding_of_teeth_bruxism" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="focal_dystonia" value="1"> Yes
                                                        <input type="radio" name="focal_dystonia" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 60px;">
                                                    <td>
                                                        <input type="radio" name="poly_myalgia_rheumatica" value="1"> Yes
                                                        <input type="radio" name="poly_myalgia_rheumatica" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="enlarged_tortuous" value="1"> Yes
                                                        <input type="radio" name="enlarged_tortuous" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="spesific_sholder_pain" value="1"> Yes
                                                        <input type="radio" name="spesific_sholder_pain" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="diplopia" value="1"> Yes
                                                        <input type="radio" name="diplopia" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="purulent_nasal" value="1"> Yes
                                                        <input type="radio" name="purulent_nasal" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="nasal_obstruction" value="1"> Yes
                                                        <input type="radio" name="nasal_obstruction" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="fever" value="1"> Yes
                                                        <input type="radio" name="fever" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="blurred_vision" value="1"> Yes
                                                        <input type="radio" name="blurred_vision" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="daytime_sleepiness" value="1"> Yes
                                                        <input type="radio" name="daytime_sleepiness" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="horners_syndrome" value="1"> Yes
                                                        <input type="radio" name="horners_syndrome" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="papillodema" value="1"> Yes
                                                        <input type="radio" name="papillodema" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="black_outs" value="1"> Yes
                                                        <input type="radio" name="black_outs" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="leaky_nose" value="1"> Yes
                                                        <input type="radio" name="leaky_nose" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="vommiting" value="1"> Yes
                                                        <input type="radio" name="vommiting" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="depressed_consciousness" value="1"> Yes
                                                        <input type="radio" name="depressed_consciousness" value="0" checked> No  
                                                    </td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr class="third_column" style="height: 1560px;"><td class="middle_column"> Associated</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Poor Memmory</td></tr>
                                                <tr style="height: 60px;"><td>Focal Neuro signs. Loss of movement, loss of sensation, hemineglect etc, speech difficulties</td></tr>
                                                <tr style="height: 40px;"><td>Poor Concentration</td></tr>
                                                <tr style="height: 40px;"><td>Irritability</td></tr>
                                                <tr style="height: 40px;"><td>Emotional Lability</td></tr>
                                                <tr style="height: 40px;"><td>Poor sight</td></tr>
                                                <tr style="height: 40px;"><td>Squinting</td></tr>
                                                <tr style="height: 40px;"><td>Insomnia</td></tr>
                                                <tr style="height: 40px;"><td>Equilibrium desturbance</td></tr>
                                                <tr style="height: 40px;"><td>Conjunctival Redness</td></tr>
                                                <tr style="height: 40px;"><td>Nausea</td></tr>
                                                <tr style="height: 40px;"><td>Neck Stiffness</td></tr>
                                                <tr style="height: 40px;"><td>restricted neck and sholder movements</td></tr>
                                                <tr style="height: 40px;"><td>Reduced hearing (hypoacusis)</td></tr>
                                                <tr style="height: 40px;"><td>Ringing in the ears (Tinnitus)</td></tr>
                                                <tr style="height: 40px;"><td>Tired eyes (Astenopia)</td></tr>
                                                <tr style="height: 40px;"><td>Eyes sensitive to light(Photophobia)</td></tr>
                                                <tr style="height: 40px;"><td>Loss of smell (Hyposmia)</td></tr>
                                                <tr style="height: 40px;"><td>Dull pain in and around jaws when eating.  (Jaw Claudation)</td></tr>
                                                <tr style="height: 40px;"><td>Jaw Locking, Restricted Jaw Movement, Jaw Noise</td></tr>
                                                <tr style="height: 40px;"><td>Jaw Tenderness</td></tr>
                                                <tr style="height: 40px;"><td>Grinding of teeth (Bruxism)</td></tr>
                                                <tr style="height: 40px;"><td>Involuntary   Muscle contractions (Focal dystonia)</td></tr>
                                                <tr style="height: 60px;"><td>Pain and stiffness in multiple muscles (Poly myalgia Rheumatica)</td></tr>
                                                <tr style="height: 40px;"><td>Enlarged, Tortuous and Tender Temporal artery </td></tr>
                                                <tr style="height: 40px;"><td>Spesific sholder pain</td></tr>
                                                <tr style="height: 40px;"><td>Diplopia (double vision)</td></tr>
                                                <tr style="height: 40px;"><td>purulent Nasal Secretion</td></tr>
                                                <tr style="height: 40px;"><td>Nasal Obstruction</td></tr>
                                                <tr style="height: 40px;"><td>Fever</td></tr>
                                                <tr style="height: 40px;"><td>Blurred Vision</td></tr>
                                                <tr style="height: 40px;"><td>Daytime sleepiness</td></tr>
                                                <tr style="height: 40px;"><td>Pupils big, and eyelid hanging low (Horners syndrome)</td></tr>
                                                <tr style="height: 40px;"><td>Papillodema</td></tr>
                                                <tr style="height: 40px;"><td>Black outs (Transcient Ischemic Attack)</td></tr>
                                                <tr style="height: 40px;"><td>leaky nose or very runny  (csf leak)</td></tr>
                                                <tr style="height: 40px;"><td>Vommiting</td></tr>
                                                <tr style="height: 40px;"><td>depressed consciousness</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- twelveth row --}}
                                <tr>
                                    <td>
                                         <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 400px;"><td> Question 12: What makes the head ache worse?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="valsalva_maneuvre" value="1"> Yes
                                                        <input type="radio" name="valsalva_maneuvre" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="bending_the_head_fw" value="1"> Yes
                                                        <input type="radio" name="bending_the_head_fw" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="retroflexion" value="1"> Yes
                                                        <input type="radio" name="retroflexion" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="head_turning" value="1"> Yes
                                                        <input type="radio" name="head_turning" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="swallowing" value="1"> Yes
                                                        <input type="radio" name="swallowing" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                 <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="coughing_strain_sexual_activity" value="1"> Yes
                                                        <input type="radio" name="coughing_strain_sexual_activity" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="upright_position" value="1"> Yes
                                                        <input type="radio" name="upright_position" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="mastication_muscles" value="1"> Yes
                                                        <input type="radio" name="mastication_muscles" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="chewing_mastication" value="1"> Yes
                                                        <input type="radio" name="chewing_mastication" value="0" checked> No  
                                                    </td>
                                                </tr>

                                                <tr style="height: 40px;">
                                                    <td>
                                                        <input type="radio" name="head_movement" value="1"> Yes
                                                        <input type="radio" name="head_movement" value="0" checked> No  
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr class="third_column" style="height: 400px;"><td class="middle_column">Exassetbated by</td></tr>
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>Valsalva Maneuvre</td></tr>
                                                <tr style="height: 40px;"><td>Bending the head FW</td></tr>
                                                <tr style="height: 40px;"><td>Bending head back wards (Retroflexion)</td></tr>
                                                <tr style="height: 40px;"><td>Head turning</td></tr>
                                                <tr style="height: 40px;"><td>Swallowing</td></tr>
                                                <tr style="height: 40px;"><td>Coughing, Strain, Sexual activity</td></tr>
                                                <tr style="height: 40px;"><td>Upright Position</td></tr>
                                                <tr style="height: 40px;"><td>Palpitation of muscles around jaws ( Mastication Muscles)</td></tr>
                                                <tr style="height: 40px;"><td>Chewing (Mastication)</td></tr>
                                                <tr style="height: 40px;"><td>Head Movement</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                {{-- thirteenth row --}}
                                <tr>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;"><td>Question 13: What makes the head ache better?</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 80px;">
                                                    <td class="text-center">
                                                        <div class="form-group">
                                                            <select class="form-control" id="question_13" name="question_13">
                                                                <option value="" selected disabled>Choose one</option>
                                                                <option value="lying_down">lying down</option>
                                                                <option value="standing_up">Standing up?</option>
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
                                                <tr style="height: 80px;"><td class="middle_column"> Improved<br>By</td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-bordered">
                                            <tbody>
                                                <tr style="height: 40px;"><td>lying down</td></tr>
                                                <tr style="height: 40px;"><td>Standing up?</td></tr>
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
                        <a href="{{ url('/2') }}" type="button" class="btn btn-warning">Previous Page</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="align-self-end text-center">
                         <button type="submit" onclick="handleSubmit()" class="btn btn-primary">Calculate Score</button> 
                    </div>
                </div>

                <div class="col-4">
                    <div class="align-self-end float-end">
                        <a href="{{ url('/') }}" type="button" class="btn btn-warning" style="pointer-events: none; cursor: default;">Next Page</a>
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

    var formData = $("#thirdForm").serialize();
    $.ajax({
        type: "POST", 
        url: "{{route('getThirdFormData')}}",
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