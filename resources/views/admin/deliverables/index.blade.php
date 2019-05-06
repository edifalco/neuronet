@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.deliverables.title')
      @can('deliverable_create')
          <a href="{{ route('admin.deliverables.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
      @endcan
      @can('deliverable_csv_import')
          <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
          @include('csvImport.modal', ['model' => 'Deliverable'])
      @endcan
    </h3>

    @can('deliverable_perma_del')
      <p>
          <ul class="list-inline">
              <li><a href="{{ route('admin.deliverables.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
              <li><a href="{{ route('admin.deliverables.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
          </ul>
      </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('deliverable_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('deliverable_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.deliverables.fields.label')</th>
                        <th>@lang('global.deliverables.fields.title')</th>
                        <th>@lang('global.deliverables.fields.project')</th>
                        <th>@lang('global.deliverables.fields.link')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('deliverable_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.deliverables.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.deliverables.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('deliverable_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'label', name: 'label'},
                {data: 'title', name: 'title'},
                {data: 'project.name', name: 'project.name'},
                {data: 'link', name: 'link'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
