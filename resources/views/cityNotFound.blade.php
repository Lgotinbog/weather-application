@extends('layouts/layout')

@section('title')
    Город не найден
@endsection

@section('content')
<div class="container" style="margin-top: 10%;padding-left: 15%;
padding-right: 15%; text-align: center;" >

<form method="GET">
    <input type="text" name="city">
    <input type="submit" value="Выбрать город">
</form>
<h1>Город {{$city}} не найден</h1>

</div>
@endsection