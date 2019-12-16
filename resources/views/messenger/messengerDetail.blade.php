@extends('layouts.adminApp')

@section('content')
    
<div class="col-sm-12 tabs-content">
    <div class="row justify-content-center cont-m">
        <div class="col-md-12">
            <h2>Чат с пользователем {{ $messenger->client()->name }}</h2>
            <div class="col-4 col-sm-12">
                <p>
                    текст 1
                </p>
            </div>
            <div class="col-4 col-sm-12 col-sm-offset-4">
                <p>
                    текст 2
                </p>
            </div>
            <div class="col-4 col-sm-12">
                <p>
                    текст 3
                </p>
            </div>
        </div>
    </div>
</div>

@endsection