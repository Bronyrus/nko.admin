@extends('layouts.adminApp')

@section('content')

<div class="col-sm-12 tabs-content">
    <div class="row justify-content-center cont-m">
        <div class="col-md-12">
            <div class="group-btn-card">
                <a href="{{ route('auth.events.create') }}" class="btn-card">Создать модератора</a>
            </div>
            <table class="table policy-table">
                <thead>
                <tr>
                    <th scope="col">Имя (никнейм)</th>
                    <th scope="col">Электронная почта</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mods as $item)
                    <tr>
                        <td><a href="mods/{{ $mods->id }}"> {{ $mods->name }} </a></td>
                        <td>{{ $mods->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection