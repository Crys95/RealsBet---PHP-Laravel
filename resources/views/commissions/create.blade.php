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
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">R$</span>
                </div>
                <input type="text" name="value" id="value" class="form-control" required
                       placeholder="0,00" pattern="[0-9]+([\,][0-9]+)?" title="Digite um valor válido no formato 0,00">
            </div>
        </div>
        <a href="{{ route('commissions.index') }}" class="btn btn-primary">Voltar</a>
        <button type="submit" class="btn btn-primary">Adicionar Comissão</button>
    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('value');

    input.addEventListener('input', function () {
        var value = this.value.replace(/[^\d\,]/g, '');

        var parts = value.split(',');
        if (parts.length > 1) {
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            this.value = parts[0] + ',' + parts[1].substring(0, 2);
        } else {
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    });
});
</script>

@endsection
