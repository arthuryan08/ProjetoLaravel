@extends('layouts.products')

@section('title', 'Novo Produto')

@section('content')
    <h1>Editar Produto</h1>

    @if(session('warning'))
    <div style='color:red'>
        <h1>{{session('warning')}}</h1>
    </div>
    @endif

    <form method="POST">
        @csrf

        <label>
            Nome do produto: <br>
            <input type="text" name='name' value='{{$data->name}}' >
        </label> <br> <br>
        <label>
            Preço: <br>
            <input type="number" step='0.01' placeholder="€ 0,00" name='price' value='{{$data->price}}'>
        </label> <br> <br>

        <input type="submit" value="Salvar">
    </form>
    
@endsection