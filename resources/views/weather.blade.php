@extends('layouts/layout')

@section('title')
    {{ $title }}
@endsection


@section('content')
    <div class="container" style="margin-top: 10%;padding-left: 15%;
        padding-right: 15%; text-align: center;" >
        <div>
            <h1>{{$city}}</h1>
        </div>
        <form method="GET">
            <input type="text" name="city">
            <input type="submit" value="Выбрать город">
        </form>
        <div style="padding-top: 10%; display: flex; justify-content: center;">
            <div>
                @switch($weather)
                    @case('Clear')
                        <img src="{{asset('img/sun.png')}}">
                    @break

                    @case('Clouds')
                        <img src="{{asset('img/cloud.png')}}">
                    @break

                    @case("Rain")
                        <img src="{{asset('img/rain.png')}}">
                    @break

                    @case("Thunderstorm")
                        <img src="{{asset('img/storm.png')}}">
                    @break
                @endswitch
            </div>
            <div>  
                <h1>{{$temperature}}°</h1>
            </div>
        </div>
        <h1> 
            @switch($weather)
                @case('Clear')
                    Солнечно
                @break

                @case('Clouds')
                    Облачно
                @break

                @case("Rain")
                    Дождь
                @break

                @case("Thunderstorm")
                    Дождь с грозой
                @break
            @endswitch
        </h1>
        <div style="display: flex; justify-content: space-between; padding-top: 10%;">
            <div>
                Ветер: {{$windSpeed}} м/с
            </div>
            <div>
                Давление: {{$pressure}} мм рт. ст.
            </div>
            <div>
                Влажность: {{$humidity}}%
            </div>
            <div>
                Видимость: {{$visibility}} км
            </div>
        </div>

    </div>
@endsection