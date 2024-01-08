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