@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="btn-group">
            @if (Route::has('login'))
                @auth
                    <a type="button" href="./dictionary/create" class="btn btn-danger">So'z qo'shish</a>
                @else
                    <a type="button" href="{{ route('login') }}" class="btn btn-success">Kirish</a>
                    @if (Route::has('register'))
                        <a type="button" href="./register" class="btn btn-warning">A'zo bo'lish</a>
                    @endif
                @endauth

            @endif

        </div>
        <hr>
        <dictionary-index></dictionary-index>
    </div>
@endsection
