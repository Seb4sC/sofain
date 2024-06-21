@extends('layouts.template')
@section('content')
    <div class="w-100 h-100">
        <div>
            @foreach ($categories as $category)
                <h1 style="color: {{$category->color}}">{{$category->name}}</h1>
                
            @endforeach
        </div>
    </div>
@endsection
