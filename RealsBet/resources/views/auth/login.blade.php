@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-warning">Login</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-warning">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Entrar</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="text-warning">Não tem uma conta? Cadastre-se</a>
            </div>
        </div>
    </div>
</div>
@endsection
