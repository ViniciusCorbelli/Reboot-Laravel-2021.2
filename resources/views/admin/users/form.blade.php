<div class="row">

    @can('adm', Auth::user())
        <div class="form-group col-sm-12">
            <input type="checkbox" id="adm", name="adm">
            <label for="adm">Administrador? </label>
        </div>
    @endcan

    <div class="form-group col-sm-6">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name',$user->name) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="email" class="required">E-mail </label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email',$user->email) }}">
    </div>

    <div class="form-group col-sm-6">
        <label for="produtos_id" class="required">Produtos</label>
        <select  class="form-control" name="produtos_id[]" value="{{ old('produtos_id') }}" multiple>
            @foreach($produtos as $produto)
                <option {{ $user->produtos()->find($produto->id) != null ? 'selected' : "" }} value="{{ $produto->id }}">{{ $produto->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6">
        <label for="password" class="required">Senha </label>
        <input type="password" name="password" id="password" class="form-control" required value="{{ old('password') }}">
    </div>
</div>
