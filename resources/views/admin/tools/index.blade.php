@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
      @lang('global.tools.title')

    @can('tool_create')

        <a href="{{ route('admin.tools.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        @can('tool_csv_import')
          <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal">@lang('global.app_csvImport')</a>
          @include('csvImport.modal', ['model' => 'Tool'])
        @endcan

    @endcan
    </h3>
    @can('tool_perma_del')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.tools.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.tools.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
          <div class="btn-group">
              <button type="button" class="btn btn-default btn-flat">Filter by project</button>
              <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                @foreach($projects as $project)
                  @if($project->name == $project_name)
                    <li><a href="/admin/tools/project/{{ $project->id }}"><b><u>{{ $project->name }}</u></b></a></li>
                  @else
                    <li><a href="/admin/tools/project/{{ $project->id }}">{{ $project->name }}</a></li>
                  @endif
                @endforeach
              </ul>
            </div>
            @if($project_name)
                <a class="btn btn-info" href="/admin/tools">Applied filter: "{{ $project_name }}" <u>Click here to remove it</u></a>
            @endif
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('tool_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('tool_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.tools.fields.name')</th>
                        <th>@lang('global.tools.fields.projects')</th>
                        <th>@lang('global.tools.fields.publication-date')</th>
                        <th>@lang('global.tools.fields.type-of-data-available')</th>
                        <th>@lang('global.tools.fields.description')</th>
                        <th>@lang('global.tools.fields.keywords')</th>
                        <th>@lang('global.tools.fields.link')</th>
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
        @can('tool_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.tools.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            var project_id='';
            var currentURL = $(location).attr('href');
            if (currentURL.indexOf("project") >= 0) {
              var array = currentURL.split('/');
              project_id = array[6];
            }
            window.dtDefaultOptions.ajax = '{!! route('admin.tools.index') !!}?show_deleted={{ request('show_deleted') }}&project_id=';
            window.dtDefaultOptions.ajax+=project_id;
            window.dtDefaultOptions.columns = [@can('tool_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'name', name: 'name'},
                {data: 'projects.name', name: 'projects.name'},
                {data: 'publication_date', name: 'publication_date'},
                {data: 'type_of_data_available', name: 'type_of_data_available'},
                {data: 'description', name: 'description'},
                {data: 'keywords', name: 'keywords'},
                {data: 'link', name: 'link'},
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
