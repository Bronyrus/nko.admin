@extends('layouts.adminApp')

@section('content')

<div class="col-sm-12 tabs-content">
    <div class="row justify-content-center cont-m">
        <div class="col-md-12">
            <div class="group-btn-card">
                <a href="{{ route('auth.events.create') }}" class="btn-card">Создать событие</a>
                <button type="button" class="btn-card btn-tc-danger js-destroy-button">Удалить отмеченные события</button>
            </div>
            <table class="table policy-table">
                <thead>
                <tr>
                    <th scope="col"><input type="checkbox" name="destroy-all-polls" class="js-destroy-all"/></th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Дата начала</th>
                </tr>
                </thead>
                <tbody>
                {{-- @foreach($polls as $poll)
                    <tr>
                        <td scope="row"><input type="checkbox" data-poll-id="{{ $poll->id }}" name="destoy-poll-{{ $poll->id }}" class="js-destroy"/></td>
                        <td><a href="poll/{{ $poll->id }}"> {{ $poll->name }} </a></td>
                        <td>{{ $poll->created_at->timezone('Europe/Moscow') }}</td>
                    </tr>
                @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection