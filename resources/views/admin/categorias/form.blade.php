<div class="row">
    <div class="form-group col-sm-6">
        <label for="nome" class="required">Nome </label>
        <input type="text" name="nome" id="nome" class="form-control" required autofocus value="{{ old('nome',$categoria->nome) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="categoria" class="required">Categorias</label>
        <select  class="form-control" name="produto_id[]" value="" multiple>
            @foreach($produtos as $produto)
                <option {{ $categoria->produtos->contains($produto) ? "selected" : "" }} value="{{ $produto->id }}">{{ $produto->nome }}</option>
            @endforeach
        </select>
    </div>
</div>
