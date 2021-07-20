@extends('admin.layouts.app')
@section('content')

@component('admin.components.create')
    @slot('title', 'Cadastrar Categoria')
    @slot('url', route('categorias.store'))
    @slot('form')
        @include('admin.categorias.form')
    @endslot
@endcomponent

@endsection
