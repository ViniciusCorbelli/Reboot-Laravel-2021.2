<div class="row">
    <div class="form-group col-sm-6">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name',$user->name) }}">
    </div>
    <div class="form-group col-sm-6">
        <label for="email" class="required">E-mail </label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email',$user->email) }}">
    </div>
</div>
