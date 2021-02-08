@extends('template')
@section('content')

<div class="container">
    <h1>Recent Questions:</h1>
    <hr/>
    @foreach($questions as $question)
    <div class="well">
        <h3>{{$question->title}}</h3>
        <p>{{$question->discription}}</p>
        <a href="{{route('questions.show', $question->id)}}" class="btn btn-primary btn-sm">View Details</a>
        <hr/>
        <hr/>
    </div>
    @endforeach
    <hr/>
    {{$questions->links()}}
    <hr/>
</div>
@endsection