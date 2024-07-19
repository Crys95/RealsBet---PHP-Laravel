@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <form method="GET" action="{{ route('dashboard') }}">
            <label for="days">Últimos:</label>
            <select name="days" id="days" onchange="this.form.submit()">
                <option value="7" {{ request('days') == 7 ? 'selected' : '' }}>7 dias</option>
                <option value="15" {{ request('days') == 15 ? 'selected' : '' }}>15 dias</option>
                <option value="30" {{ request('days') == 30 ? 'selected' : '' }}>30 dias</option>
            </select>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Afiliado</th>
                    <th>Data</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commissions as $commission)
                    <tr>
                        <td>{{ $commission->affiliate->name }}</td>
                        <td>{{ $commission->date }}</td>
                        <td>{{ $commission->value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
