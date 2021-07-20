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
            <input type="number" name="preco" id="preco" class="form-control" required autofocus value="{{ old('preco',$produto->preco) }}">
        </div>
    </div>
</div>
