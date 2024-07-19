@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Comissões</h1>

    <div class="text-right mb-3">
        <a href="{{ route('commissions.create') }}" class="btn btn-success">Adicionar Comissão</a>
    </div>

    @if ($commissions->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            Nenhuma comissão encontrada.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Afiliado</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commissions as $commission)
                        <tr>
                            <td>{{ $commission->affiliate->name }}</td>
                            <td>{{ number_format($commission->value, 2, ',', '.') }}</td>
                            <td>{{ $commission->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta comissão?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
