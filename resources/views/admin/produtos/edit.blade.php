@extends('admin.layouts.app')
@section('content')

@component('admin.components.edit')
    @slot('title', 'Editar Produto')
    @slot('url', route('produtos.update', $produto->id))
    @slot('form')
        @include('admin.produtos.form')
    @endslot
@endcomponent

@endsection
