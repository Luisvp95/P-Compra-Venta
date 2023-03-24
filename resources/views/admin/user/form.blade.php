<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        placeholder="Ingrese nombre de usuario">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Correo</label>
    <input name="email" id="email" class="form-control @error('email') is-invalid @enderror"
        placeholder="Ingrese correo electrónico">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
        placeholder="Ingrese contraseña">
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Rol</label>
    {!! Form::select(
        'roles[]',
        $roles,
        [],
        ['class' => 'form-control' . ($errors->has('roles') ? ' is-invalid' : ''), 'name'=>'roles', 'placeholder' => 'Seleccione rol',''],
    ) !!}
    @if ($errors->has('roles'))
        <div class="invalid-feedback">{{ $errors->first('roles') }}</div>
    @endif
</div>

