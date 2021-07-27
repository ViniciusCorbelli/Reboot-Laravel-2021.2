@extends('admin.layouts.app')
@section('content')

@component('admin.components.table')
    @can('create', App\Produtos::class)
        @slot('create', route('produtos.create'))
    @endcan
    @slot('title', 'Produtos')
    @slot('head')
        <th>Nome</th>
        <th>Preço</th>
        <th></th>
    @endslot
    @slot('body')
        @foreach ($produtos as $produto)
            @can('view', $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td class="options">
                        @can('update', $produto)
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                        @endcan
                        
                        @can('view', $produto)
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        @endcan

                        @can('delete', $produto)
                            <form class="form-delete" action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endcan
        @endforeach
    @endslot
@endcomponent

@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
