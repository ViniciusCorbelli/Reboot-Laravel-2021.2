@extends('admin.layouts.app')
@section('content')

@component('admin.components.edit')
    @slot('title', 'Editar Categoria')
    @slot('url', route('categorias.update', $categoria->id))
    @slot('form')
        @include('admin.categorias.form')
    @endslot
@endcomponent

@endsection
