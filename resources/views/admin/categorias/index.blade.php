@extends('admin.layouts.app')
@section('content')

@component('admin.components.table')
    @slot('create', route('categorias.create'))
    @slot('title', 'Categorias')
    @slot('head')
        <th>Nome</th>
        <th></th>
    @endslot
    @slot('body')
        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nome }}</td>
                <td class="options">
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                    <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>

                    <form class="form-delete" action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endslot
@endcomponent

@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
