<div class="row">
    <div class="form-group col-sm-6">
        <label for="nome" class="required">Nome </label>
        <input type="text" name="nome" id="nome" class="form-control" required autofocus value="{{ old('nome',$produto->nome) }}">
    </div>

    <div class="form-group col-sm-6">
        <label for="preco" class="required">Preço </label>
        <div class="mb-3 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input step="0.1" type="number" name="preco" id="preco" class="form-control" required autofocus value="{{ old('preco',$produto->preco) }}">
        </div>
    </div>

    <div class="form-group col-sm-6">
        <label for="categoria" class="required">Categorias</label>
        <select  class="form-control " name="categoria_id" value="">
            <option value="">Nennum</option>
            @foreach($categorias as $categoria)
                <option {{ $produto->categoria_id == $categoria->id ? "selected" : "" }} value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6">
        <label for="usuarios_id" class="required">Usuários</label>
        <select  class="form-control" name="usuarios_id[]" value="" multiple>
            @foreach($users as $user)
                <option {{ $produto->users()->find($user->id) != null ? 'selected' : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

</div>
