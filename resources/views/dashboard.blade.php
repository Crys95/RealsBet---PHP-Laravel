@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row mb-4">
            <div class="col-md-6">
                <form method="GET" action="{{ route('dashboard') }}">
                    <div class="form-group">
                        <label for="days">Mostrar últimos:</label>
                        <select name="days" id="days" class="form-control" onchange="this.form.submit()">
                            <option value="7" {{ request('days') == 7 ? 'selected' : '' }}>7 dias</option>
                            <option value="15" {{ request('days') == 15 ? 'selected' : '' }}>15 dias</option>
                            <option value="30" {{ request('days') == 30 ? 'selected' : '' }}>30 dias</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @auth
                    <a href="{{ route('affiliates.index') }}" class="btn btn-primary">Afiliados</a>
                    <a href="{{ route('commissions.index') }}" class="btn btn-success ml-2">Comissões</a>
                @endauth
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Afiliado</th>
                        <th>Data</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($commissions as $commission)
                        <tr>
                            <td>{{ $commission->affiliate->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($commission->date)->format('d/m/Y H:i') }}</td>
                            <td>{{ $commission->value }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nenhuma comissão encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
