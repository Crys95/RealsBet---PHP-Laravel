@extends('layouts.app')

@section('content')
    @php
        $header = 'Dashboard de Comissões'; // Define o header
    @endphp

    <div>
        <!-- Aqui você pode listar as comissões -->
        @foreach ($commissions as $commission)
            <p>{{ $commission->value }} - {{ $commission->created_at }}</p>
        @endforeach
    </div>
@endsection
