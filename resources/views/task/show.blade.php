@extends('base')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <h2 class="h2"> {{ $task->title }} </h2>
            <p>{{ $task->description }}</p>
        </div>
    </div>
</div>
@endsection