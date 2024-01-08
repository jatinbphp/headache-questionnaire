<!DOCTYPE html>
<html>
<head>
    <title>Survey Results</title>
</head>
<body>
    <h1>Survey Results</h1>

    <p>Name:    {{ session()->has('user') ? session()->get('user')['name'] : '' }}</p>
    <p>Number:  {{ session()->has('user') ? session()->get('user')['number'] : '' }}</p>
    <p>Email:   {{ session()->has('user') ? session()->get('user')['email'] : '' }}</p>
    <p>Gender:  {{ session()->has('user') ? session()->get('user')['gender'] : '' }}</p>
    <p>Age:     {{ session()->has('user') ? session()->get('user')['age'] : '' }}</p>

    <h2>Responses to Questions:</h2>

    @if(isset($postData) && isset($questionData))
        @foreach (range(1, 19) as $i)
            <p>{{$questionData['que'.$i]}} : <b>{{ $postData['que'.$i] }}</b></p>
        @endforeach
    @endif

    @if(isset($results) && !empty($results))
        @foreach($results as $key => $value)
            <p>{{ $key }} : <b>{{ $value }}</b></p>
        @endforeach
    @endif

<p>Total Score is : <b>{{$score}}</b></p>
</body>
</html>
