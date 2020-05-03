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
            <form method="POST" action="{{ route('reset') }}">
                @csrf
                <div class="form-group">
                <div class="form-group">
                    <label for="password">{{ $question }}</label>
                </div>
                    <label for="respuesta">Respuesta</label>
                    <input id="respuesta" class="au-input au-input--full @error('respuesta') is-invalid @enderror" type="password" name="respuesta" required autocomplete="current-password"/>
                    
                    @error('respuesta')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="hidden" name="id_user" id="id_user" value="{{ $id_user }}">
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Enviar</button>
                <a href="{{ route('login') }}"><button class="au-btn au-btn--block au-btn--red m-b-20" type="button"  >Cancelar</button>
                    </a>
            </form>
        </div>
    </div>
</div>

@endsection
