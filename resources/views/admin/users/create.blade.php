@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                <label for="firstname">Prénom *</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('firstname'))
                    <em class="invalid-feedback">
                        {{ $errors->first('firstname') }}
                    </em>
                @endif
                <p class="helper-block">
                    Veuillez saisie le prénom
                </p>
            </div>
            <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
              <label for="lastname">Prénom *</label>
              <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname', isset($user) ? $user->name : '') }}">
              @if($errors->has('lastname'))
                  <em class="invalid-feedback">
                      {{ $errors->first('lastname') }}
                  </em>
              @endif
              <p class="helper-block">
                  Veuillez saisie le nom
              </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
              <label for="phone">Téléphone</label>
              <input type="number" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($user) ? $user->phone : '') }}">
              @if($errors->has('phone'))
                  <em class="invalid-feedback">
                      {{ $errors->first('phone') }}
                  </em>
              @endif
              <p class="helper-block">
                  Veuillez saisir le prénom
              </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection