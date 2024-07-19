@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Adicionar Comissão</h1>

    <form action="{{ route('commissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="affiliate_id">Afiliado:</label>
            <select name="affiliate_id" id="affiliate_id" class="form-control" required>
                @foreach($affiliates as $affiliate)
                    <option value="{{ $affiliate->id }}">{{ $affiliate->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Data:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="value">Valor:</label>
            <input type="number" name="value" id="value" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Comissão</button>
    </form>

</div>
@endsection
