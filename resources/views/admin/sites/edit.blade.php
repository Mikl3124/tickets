@extends('layouts.master')
@section('content')

    <h1 class="text-center">{{ $site->name }}</h1>

      <div class="card-body">
        <form action="{{ route("admin.sites.update", [$site->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
              <div class="card-header text-center">
                <h3>Informations</h3>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nom du site *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($site) ? $site->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                    </p>
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('url') ? 'has-error' : '' }}">
                    <label for="url">URL</label>
                    <input type="url" id="url" name="url" class="form-control" value="{{ old('url', isset($site) ? $site->url : '') }}">
                    @if($errors->has('url'))
                        <em class="invalid-feedback">
                            {{ $errors->first('url') }}
                        </em>
                    @endif
                    <p class="helper-block">
                    </p>
                  </div>
                  <div class="form-group col-md-2{{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="type">Type de site</label>
                    <select name="type" id="type" class="form-control">
                        <option value="vitrine">Vitrine</option>
                        <option value="commerce">E-commerce</option>
                        <option value="autre">Autre</option>
                    </select>
                    @if($errors->has('type'))
                        <em class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </em>
                    @endif
                    <p class="helper-block">
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header text-center">
                <h3>Contacts</h3>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-8{{ $errors->has('users') ? 'has-error' : '' }}">
                    <label for="users"><i class="fa fa-users" aria-hidden="true"></i> Contacts liés</label>
                    <select name="users[]" id="users" class="form-control select2" multiple="multiple">
                      @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ (in_array($user->id, old('users', [])) || isset($user) && $site->users->contains($user->id)) ? 'selected' : '' }}> {{ $user->firstname }} {{ $user->lastname }}</option>
                      @endforeach
                    </select>
                    @if($errors->has('users'))
                      <em class="invalid-feedback">
                          {{ $errors->first('users') }}
                      </em>
                    @endif
                    <p class="helper-block"></p>
                  </div>
                  <div class="form-group col-md-4{{ $errors->has('contact') ? 'has-error' : '' }}">
                    <label for="contact"><i class="fa fa-user" aria-hidden="true"></i> Contact Principal</label>
                    <select name="contact_id" id="contact" class="form-control">
                      @foreach($users as $user)
                        {{-- <option  value="{{ $user->id }}" {{ (old('contact_id') || isset($user) && $site->user_id ===$user->id) ? 'selected' : '' }}>{{ $user->firstname }} {{ $user->lastname }}</option> --}}
                        <option value="{{ $user->id }}" {{ $user->id == $site->contact_id ? 'selected' : '' }}>{{ $user->firstname }}</option>
                      @endforeach
                    </select>
                    @if($errors->has('contact'))
                        <em class="invalid-feedback">
                            {{ $errors->first('contact') }}
                        </em>
                    @endif
                    <p class="helper-block"></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header text-center">
                <h3>SEO</h3>
              </div>
              <div class="card-body">
                <!-- Button trigger keywordsmodal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Ajouter un mot clé
                </button>
                <div>
                  @foreach ($keywords as $keyword)
                    <hr>
                    <div class="m-2 d-flex justify-content-between">
                      <h5>{{ $keyword->title }}</h5>
                      <form action="{{ route('admin.keywords.destroy', $keyword->id) }}" method="POST" onsubmit="return confirm('Etes vous sûr de vouloir supprimer ce mot clé?');" style="display: inline-block;">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" class="btn btn-xs btn-danger" value="Effacer">
                       </form>
                    </div>

                  @endforeach
                </div>
              </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
      </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Saisir un mot clé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{ route("admin.keywords.store", [$site->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
              <input type="hidden" name="site_id" value="{{ $site->id }}">
              <input type="text" id="keyword" name="title" class="form-control" value="{{ old('title', isset($site) ? $site->keywords : '') }}" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
      <form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.tickets.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($site) && $site->attachments)
          var files =
            {!! json_encode($site->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>

<script>

</script>

@stop

