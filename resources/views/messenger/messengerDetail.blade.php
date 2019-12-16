@extends('layouts.adminApp')

@section('content')
    
<div class="col-sm-12 tabs-content">
    <div class="row justify-content-center cont-m">
        <div class="col-md-12">
            <h2>Чат с пользователем {{ $messenger->client()->name }}</h2>
            {{-- <div class="col-4 col-sm-12">
                <p>
                    {!! htmlspecialchars_decode($event->body) !!}
                </p>
            </div>
            <div class="col-4 col-sm-12">
                Дата проведения: {{ date('d.m.Y', strtotime($event->date_start)) }}
            </div>
            <div class="col-4 col-sm-12">
                Место проведения: {{ $event->place }}
            </div> --}}
        </div>
    </div>
</div>

@endsection