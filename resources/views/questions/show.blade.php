@extends('template')
@section('content')


<div class="container">
    <h1>{{$question->title}}</h1>
    <p class="lead">
        {{$question->discription}}
    </p>

<!--Prikazi sve odgovore jednog pitanja-->
@if($question->answers->count()>0)
    @foreach ($question->answers as $answer)
        <div class="card">
        <div class="card-header">
            <h5>Answer</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{$answer->content}}</p>
            </div>
        </div>
    @endforeach
@else
    <p>Please submit your answer</p>
@endif

<form action="{{route('answers.store')}}" method="POST">
    {{csrf_field()}}

    <h4>Submit Your own Answer:</h4>
    <textarea class="form-control" name="content" rows="4"></textarea>
    <input type="hidden" value="{{$question->id}}" name="question_id"/>
    <button class="btn btn-primary">Submit answer</button>

</form>

</div>


@endsection