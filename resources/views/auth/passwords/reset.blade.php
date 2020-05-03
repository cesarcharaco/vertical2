@extends('layouts.app')

@section('content')

<div class="login-wrap">
    <div class="login-content">
        <div class="login-logo">
            <a href="#">
                <img src="{{ asset('images/icon/logo.png') }}" alt="GBM Hugo Chávez">
            </a>
        </div>
        <div class="login-form">
            <div class="col-md-12">
          @include('flash::message')
        </div>
        <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-dange">
            <p>Corrige los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <form method="POST" action="{{ route('resetpassword') }}">
                @csrf
                <div class="form-group">
                    <label for="password">Nueva Clave</label>
                    <input id="password" class="au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password"/>
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Confirme nueva clave</label>
                    <input id="password_confirmation" class="au-input au-input--full @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="current-password"/>
                    
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="hidden" name="id_user" id="id_user" value="{{ $id_user }}">
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>

@endsection
