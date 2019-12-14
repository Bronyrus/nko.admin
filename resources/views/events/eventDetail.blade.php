@extends('layouts.adminApp')

@section('content')
    
<div class="col-sm-12 tabs-content">
    <div class="row justify-content-center cont-m">
        <div class="col-md-12">
            <h2>Мероприятие {{ $event->head }}</h2>
            <div class="col-4 col-sm-12">
                <p>
                    {!! htmlspecialchars_decode($event->body) !!}
                </p>
            </div>
            <div class="col-4 col-sm-12">
                Дата проведения: {{ date('d.m.Y', strtotime($event->date_start)) }}
            </div>
            <div class="col-4 col-sm-12">
                Место проведения: {{ $event->place }}
            </div>
            <h2>Зарегистрированные участники (всего: человек(a))</h2>
            <table class="table policy-table">
                <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                </tr>
                </thead>
                <tbody>
                {{-- @foreach($events as $item)
                    <tr>
                        <td><a href="events/{{ $item->id }}"> {{ $item->head }} </a></td>
                        <td>{{ $item->date_start }}</td>
                    </tr>
                @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection