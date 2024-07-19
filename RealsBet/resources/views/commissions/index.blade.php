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
                        <th>Valor</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commissions as $commission)
                        <tr>
                            <td>{{ number_format($commission->value, 2, ',', '.') }}</td>
                            <td>{{ $commission->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
