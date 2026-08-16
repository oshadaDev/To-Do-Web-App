@extends('layouts.app')

@section('content')

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-bold">
                    <h1 class="page-title">Home Page</h1>
                </div>
            </div>
        </div>
    </body>
@endsection

@push('css')
    <style>
        .page-title {
            padding: 5px;
            font-size: 36px;
            font-weight: bold;
            color: #535252;
            margin-top: 50px;
        }
    </style>
@endpush