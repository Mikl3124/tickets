@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        Fiche de {{ $user->firstname }} {{ $user->lastname }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Prénom
                        </th>
                        <td>
                            {{ $user->firstname }}
                        </td>
                    </tr>
                    <tr>
                      <th>
                          Nom
                      </th>
                      <td>
                          {{ $user->lastname }}
                      </td>
                    </tr>
                    <tr>
                      <th>
                          Téléphone
                      </th>
                      <td>
                          {{ $user->phone }}
                      </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Roles
                        </th>
                        <td>
                            @foreach($user->roles as $id => $roles)
                                <span class="label label-info label-many">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Site(s)
                        </th>
                        <td>
                            @foreach($user->sites as $site)
                                <span class="label label-info label-many">{{ $site->name }}</span><br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                      <th>
                          Commentaire
                      </th>
                      <td>
                        {{ $user->comments }}
                      </td>
                  </tr>
                </tbody>
            </table>
            <div class="d-flex">
              <a style="margin-top:20px;" class="btn btn-secondary mr-2" href="{{ url()->previous() }}">
                Retour
              </a>
              <a style="margin-top:20px;" class="btn btn-primary mr-2"  href="{{ route('admin.users.edit', $user->id) }}">
                Modifier
              </a>
            </div>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
