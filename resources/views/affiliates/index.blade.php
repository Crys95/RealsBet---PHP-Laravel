@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Afiliados</h1>

    <div class="text-right mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-danger">Dashboard</a>
        <a href="{{ route('affiliates.create') }}" class="btn btn-success">Novo Afiliado</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($affiliates as $affiliate)
                <tr>
                    <td>{{ $affiliate->name }}</td>
                    <td>{{ $affiliate->email }}</td>
                    <td>{{ $affiliate->status }}</td>
                    <td>
                        <form action="/affiliates/{{ $affiliate->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Remover</button>
                        </form>
                        <form action="{{ route('affiliates.updateStatus', $affiliate->id) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="status" value="{{ $affiliate->status === 'ativo' ? 'inativo' : 'ativo' }}">
                            <button class="btn btn-primary btn-sm" type="submit">Mudar Status</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
