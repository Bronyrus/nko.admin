@extends('layouts.adminApp')

@section('content')

<div class="col-sm-12 tabs-content">
    <div class="row justify-content-center cont-m">
        <div class="col-md-12">
            <table class="table policy-table">
                <thead>
                <tr>
                    <th scope="col">Клиент</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Последнее сообщение</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messengers as $item)
                    
                    <tr>
                        <td>{{ $item->UserToMessage()->client()->name }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection