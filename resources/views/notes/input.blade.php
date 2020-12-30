@extends('layouts.app')

@section('content')
<style>
    .june{
        display: flex;
        justify-content: center;
    }
    textarea{
        width: 500px;
        height: 600px;
    }
    .first{
        margin-top: 30px;
        margin-bottom: 30px;
    }
    #title{
        width: 450px;
    }
</style>

<div class="june">
    <form method="post" action="/notes">
        @csrf
        <div class="first">
            <label for="title">주제:</label>
            <input type="text" id="title" name="title">
        </div>

        <div class="two">
            <textarea name="contents" required>
            </textarea>
        </div>

    <input type="submit">
    </form>
</div>
@endsection
