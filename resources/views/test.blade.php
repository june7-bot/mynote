@extends('layouts.app')
@section('content')
<style>
    #sidebar{
        width: 150px;
        height: 100%;
        position: absolute;
        top:100px;
        left: -150px;
        transition: left 0.5s;
    }
    #sidebar.visible{
        left: 0px;
        transition: left 0.7s;
    }
    #sidebar_btn{
        display: inline-block;
        vertical-align: middle;
        width: 20px;
        height: 15px;
        cursor: pointer;
        margin: 20px;
        position: absolute;
        right: -60px;
        top: 0px;
    }

    #sidebar_btn span {
        background-color: black;
        height: 1px;
        display: block;
        margin-bottom: 5px;
    }
    #sidebar_btn span:nth-child(2){
        width: 75%;
    }

</style>

<div id = "sidebar">
    <ul>
        <li>주제1</li>
        <li>주제2</li>
        <li>주제3</li>
    </ul>

    <div id = "sidebar_btn">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<script>
    $('#sidebar_btn').click(function (){
        $('#sidebar').toggleClass('visible');
    })
</script>
@endsection
