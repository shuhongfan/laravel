<?php
?>
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="{{asset('css')}}/app.css">
{{--模板继承--}}
@extends('home.test.parent')
@section('mianbody')
<div>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur atque ea exercitationem maxime nostrum nulla soluta temporibus unde veritatis! Aut consectetur error minima modi neque nihil nobis perferendis quos.
</div>
@endsection

{{--文件的包含--}}
@include('home.test.parent')