@extends('layouts.app')

@section('content')

    <style>
        .june{
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1;
        }
        .first{
            margin-top: 30px;
            margin-bottom: 30px;
        }

    </style>

    <div class="june">

        <div class="first">
            <h1>{{$notes->title}}</h1>
        </div>

        <div class="first">
            <p>{{$notes->content}}</p>
        </div>
    </div>
@endsection
