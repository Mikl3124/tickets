@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        Création d'un nouveau site
    </div>
    <div class="card-body">
        <form action="{{ route("admin.sites.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="updated_by" value="{{ Auth::user()->id }}">
            <div class="form-row">
              <div class="form-group col-md-5 {{ $errors->has('name') ? 'has-error' : '' }}">
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
              <div class="form-group  col-md-5{{ $errors->has('url') ? 'has-error' : '' }}">
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
              <div class="form-group col-md-2 {{ $errors->has('type') ? 'has-error' : '' }}">
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
                        <option value="{{ $user->id }}" {{ (in_array($user->id, old('users', []))) ? 'selected' : '' }}> {{ $user->firstname }} {{ $user->lastname }}</option>
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
                        <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
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

            <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                <label for="attachments">Logo</label>
                <div class="needsclick dropzone" id="attachments-dropzone">

                </div>
                @if($errors->has('attachments'))
                    <em class="invalid-feedback">
                        {{ $errors->first('attachments') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.attachments_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


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
@stop

