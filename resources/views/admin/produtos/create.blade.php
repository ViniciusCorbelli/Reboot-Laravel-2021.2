@extends('admin.layouts.app')
@section('content')

@component('admin.components.create')
    @slot('title', 'Cadastrar Produto')
    @slot('url', route('produtos.store'))
    @slot('form')
        @include('admin.produtos.form')
    @endslot
@endcomponent

@endsection
