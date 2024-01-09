@extends('app')
@section('content')
@php
    $gender = [
        '' => 'Select Gender',
        'male' => 'Male',
        'female' => 'Female'
    ];
    $ansOptions = [
        'yes' => 'Yes',
        'no' => 'No',
    ];
@endphp
<div class="content-wrapper">
    <section class="container content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4 class="text-center">Primary Headache Questionnaire</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="container content">        
        <div class="card card-info p-3">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['method'=>'POST','id' => 'submissionsForm', 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('redirects_to', URL::previous()) !!}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="control-label" for="name">Name & Surname :<span class="text-danger">*</span></label>
                                        {!! Form::text('name', null, ['required' => true, 'class' => 'form-control mt-2', 'placeholder' => 'Enter Name & Surname', 'id' => 'name']) !!}
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mt-2">
                                    <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                        <label class="control-label" for="number">Contact Number :<span class="text-danger">*</span></label>
                                        {!! Form::text('number', null, ['required' => true,'class' => 'form-control mt-2', 'placeholder' => 'Contact Number', 'id' => 'number']) !!}
                                        @if ($errors->has('number'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mt-2">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="control-label" for="email">Email Address :<span class="text-danger">*</span></label>
                                        {!! Form::email('email', null, ['required' => true,'class' => 'form-control mt-2', 'placeholder' => 'Enter Email Address', 'id' => 'email']) !!}
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mt-2">
                                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        <label class="control-label" for="gender">Gender :<span class="text-danger">*</span></label>
                                        {!! Form::select('gender', $gender, null, ['required' => true,'class' => 'form-control select2 mt-2','id'=>'gender']) !!}
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mt-2">
                                    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                        <label class="control-label" for="age">Age :<span class="text-danger">*</span></label>
                                        {!! Form::text('age', null, ['required' => true,'class' => 'form-control mt-2', 'placeholder' => 'Enter Age', 'id' => 'age']) !!}
                                        @if ($errors->has('age'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('age') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mt-3" id="accordion-questions">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                    Sudden Onset (thunder clap)
                                    </button>
                                </h2>
                                <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="section-1" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que1">
                                                    <strong>Q. </strong>Does the head ache comes out of the blue and is most painful within one to 5 minutes of starting?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que1', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                            @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label class="control-label" for="que2">
                                                    <strong>Q. </strong>How severe is the head ache? 1 meaning no pain, and 10 meaning you wish you would rather die.
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">                                               
                                               <select name="que2" id="que2">
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                                    Worsening Pattern
                                    </button>
                                </h2>
                                <div id="collapse-2" class="accordion-collapse collapse show" aria-labelledby="section-2" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que3">
                                                    <strong>Q. </strong>Is it usually the same kind of head ache, but it gets worse and worse every time you get a new attack?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que3', $key, $key=='yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                                    Change in Pattern relative to previous Head Aches
                                    </button>
                                </h2>
                                <div id="collapse-3" class="accordion-collapse collapse show" aria-labelledby="section-3" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que4">
                                                    <strong>Q. </strong>Would you describe the head ache that bothers you as different from past head aches, or is it the same head ache?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que4', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-4">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="true" aria-controls="collapse-4">
                                    Fixed Laterality
                                    </button>
                                </h2>
                                <div id="collapse-4" class="accordion-collapse collapse show" aria-labelledby="section-4" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que5">
                                                    <strong>Q. </strong>Is the head ache always on the same side of the head?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que5', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-5">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="true" aria-controls="collapse-5">
                                    Triggered by cough Exertion, and postural changes
                                    </button>
                                </h2>
                                <div id="collapse-5" class="accordion-collapse collapse show" aria-labelledby="section-5" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que6">
                                                    <strong>Q. </strong>is the head ache triggers physical activity
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que6', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label class="control-label" for="que7">
                                                    <strong>Q. </strong>is the head ache triggered by Coughing
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que7', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label class="control-label" for="que8">
                                                    <strong>Q. </strong>is the head ache triggered by bending forward, or laying down
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que8', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label class="control-label" for="que9">
                                                    <strong>Q. </strong>Is the head ache worse  when standing and less when lying down
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que9', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-6">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="true" aria-controls="collapse-6">
                                    Nocturnal or early morning onset
                                    </button>
                                </h2>
                                <div id="collapse-6" class="accordion-collapse collapse show" aria-labelledby="section-6" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que10">
                                                    <strong>Q. </strong>Does the head ache come at night, or in the early hours of the morning, or do you wake up with a head ache?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que10', $key, $key == 'no', ['class' => 'flat-red' , 'id' => $key,null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row hide-options" style="display: none">
                                            <div class="col-md-12 mt-2">
                                                <label class="control-label" for="que11">
                                                    <strong>Q. </strong>if yes: Do you wake up because of the head aches?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que11', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-7">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-7" aria-expanded="true" aria-controls="collapse-7">
                                    New Onset after age 50
                                    </button>
                                </h2>
                                <div id="collapse-7" class="accordion-collapse collapse show" aria-labelledby="section-7" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que12">
                                                    <strong>Q. </strong>Is it a new type head ache that started after age 50?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que12', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-8">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-8" aria-expanded="true" aria-controls="collapse-8">
                                    New onset in association with systemic illness
                                    </button>
                                </h2>
                                <div id="collapse-8" class="accordion-collapse collapse show" aria-labelledby="section-8" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que13">
                                                    <strong>Q. </strong>Are you suffering from some kind of systemic illness like blood pressure, Diabetes, or organ failure?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que13', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-9">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-9" aria-expanded="true" aria-controls="collapse-9">
                                    Systemic Symptoms and Signs, fever, rash, or stiff neck
                                    </button>
                                </h2>
                                <div id="collapse-9" class="accordion-collapse collapse show" aria-labelledby="section-9" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que14">
                                                    <strong>Q. </strong>Is the head ache associated with any of the following: Fever
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que14', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label class="control-label" for="que15">
                                                    <strong>Q. </strong>Is the head ache associated with any of the following: Rash
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que15', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label class="control-label" for="que16">
                                                    <strong>Q. </strong>Is the head ache associated with any of the following:  a Stiff neck
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que16', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-10">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-10" aria-expanded="true" aria-controls="collapse-10">
                                    Seizures
                                    </button>
                                </h2>
                                <div id="collapse-10" class="accordion-collapse collapse show" aria-labelledby="section-10" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que17">
                                                    <strong>Q. </strong>Is the head ache associated with any of the following: Uncontrollable jerking movements of the arms and legs,  Loss of consciousness or awareness or Cognitive or emotional symptoms, such as fear, anxiety or deja vu.
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que17', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-11">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-11" aria-expanded="true" aria-controls="collapse-11">
                                    Focal neurological signs OTHER than visual aura
                                    </button>
                                </h2>
                                <div id="collapse-11" class="accordion-collapse collapse show" aria-labelledby="section-11" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que18">
                                                    <strong>Q. </strong>Is the head ache associated with any of the following: Muscle tremors or uncontrollable muscle movements, strange sensation, numbness or
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que18', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="section-12">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-12" aria-expanded="true" aria-controls="collapse-12">
                                    Cognitive Impairment and personality change
                                    </button>
                                </h2>
                                <div id="collapse-12" class="accordion-collapse collapse show" aria-labelledby="section-12" data-bs-parent="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="que19">
                                                    <strong>Q. </strong>Have you experienced a change in personality lately, e.g. more or less aggressive than normal, or difficulty with memory?
                                                </label>
                                            </div>
                                            <div class="col-md-12 mt-2 ms-3">
                                                @foreach ($ansOptions as $key => $value)
                                                <label>
                                                    {!! Form::radio('que19', $key, $key == 'yes', ['class' => 'flat-red',null]) !!} <span style="margin-right: 10px">{{ $value }}</span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="align-self-end ml-auto">
                                    <button type="submit" class="btn btn-primary mt-3">Calculate Score</button>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="align-self-end float-end">
                                    <a href="{{ url('/2') }}" id="nextBtn" style="pointer-events: none; cursor: default;" type="button" class="btn btn-warning mt-3">Next Page</a>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="alert alert-success" id="success" style="display:none">
                
        </div>

        <div class="alert alert-danger" id="error" style="display:none">
                
        </div>
    </section>
</div>
@endsection
@section('jquery')
<script type="text/javascript">
    jQuery('#yes').change(function(){
        jQuery('.hide-options').show();
    });
    jQuery('#no').change(function(){
        jQuery('.hide-options').hide();
    });

    $(document).ready(function () {
  $("form").submit(function (event) {
    var formData = $('#submissionsForm').serialize();
    $.ajax({
        url: "{{route('getFormData')}}",
        type: "POST",
        data : formData,
    }).done(function (data) {
        //data.yes_percentage = parseInt(data.yes_percentage);
        if(data.yes_percentage>50){
            $("#success").show();
            $("#nextBtn").css({ 'pointer-events' : '', 'cursor' : '' });
            var msg = "You achieved a score of "+data.score+", your score is above 50% for the red flags questionnaire. Please follow the link below for more info<br>";
            msg+="<a href='https://www.xzy.com' target='blank'>https://www.xzy.com</a>";
            $("#success").html(msg);
            $("#error").hide();
        } else {
            $("#success").hide();
            $("#nextBtn").css({ 'pointer-events' : '', 'cursor' : '' });
            var msg = "You achieved a score of "+data.score+", your score is below 50% for the red flags questionnaire. Please follow the link below for more info<br>";
            msg+="<a href='https://www.moreinfo.com' target='blank'>https://www.moreinfo.com</a>";
            $("#error").html(msg);
            $("#error").show();
        }
    });

    event.preventDefault();
  });
});

</script>
@endsection