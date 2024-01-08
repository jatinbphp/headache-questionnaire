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
                                                                <option value="any_age_between_2_years_and_99_years">Any age between 2 years and 99 years.</option>
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
                        <a href="{{ url('/') }}" type="button" class="btn btn-warning">Next Page</a>
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