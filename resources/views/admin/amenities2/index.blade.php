@extends('layouts.admin')
@section('content')
@can('amenity2_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.amenities2.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.amenity2.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.amenity2.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Amenity2">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.amenity2.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.amenity2.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($amenities2 as $key => $amenity2)
                        <tr data-entry-id="{{ $amenity2->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $amenity2->id ?? '' }}
                            </td>
                            <td>
                                {{ $amenity2->name ?? '' }}
                            </td>
                            <td>
                                @can('amenity2_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.amenities2.show', $amenity2->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('amenity2_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.amenities2.edit', $amenity2->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('amenity2_delete')
                                    <form action="{{ route('admin.amenities2.destroy', $amenity2->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('amenity2_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.amenities2.massDestroy') }}",
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
  $('.datatable-Amenity2:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection