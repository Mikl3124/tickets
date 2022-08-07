@extends('layouts.master')
@section('content')
@can('site_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.sites.create") }}">
                Ajouter un site
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>

                        <th>
                          Site
                        </th>
                        <th>
                          Url
                        </th>
                        <th>
                          Contact
                        </th>
                        <th>
                          Contact
                        </th>
                        <th>
                          Contact
                        </th>
                        <th>
                          Type
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sites as $key => $site)
                        <tr data-entry-id="{{ $site->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $site->name }}
                            </td>
                            <td>
                                <a href="{{ $site->url }}">{{ $site->url }}</a>
                            </td>
                            <td>
                              Colonne 3
                          </td>
                            <td>
                                Colonne 4
                            </td>
                            <td>
                                Colonne 5
                            </td>
                            <td>
                                @switch($site->type)
                                    @case('vitrine')
                                        <span class="badge badge-info">{{ $site->type }}</span>
                                        @break
                                    @case('commerce')
                                        <span class="badge badge-warning">{{ $site->type }}</span>
                                        @break
                                    @default
                                        <span class="badge badge-secondary">{{ $site->type }}</span>
                                @endswitch
                            </td>
                            <td>
                                @can('site_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sites.show', $site->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('site_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sites.edit', $site->id) }}">
                                        Compléter
                                    </a>
                                @endcan

                                @can('site_delete')
                                    <form action="{{ route('admin.sites.destroy', $site->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sites.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
