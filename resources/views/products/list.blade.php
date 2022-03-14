@extends('layouts.products')

@section('title', 'Lista dos Produtos')

@section('content')
    <h1>Escolha um de nossos produtos pra comprar</h1>

    <a href="{{ route('products.new')}}">Adicionar novo produto</a> <br/>
    <br>
    <br>

    @if(count($list)>0)
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        @foreach($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>€ {{$item->price}}</td>
                <td>
                    <a href="{{ route('products.edit', ['id'=>$item->id]) }}">Editar</a>
                    <a href="{{ route('products.del', ['id'=>$item->id]) }}" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        Não há produtos listados
    @endif
    
@endsection