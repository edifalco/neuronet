@inject('request', 'Illuminate\Http\Request')
@extends('layouts.plugin')

@section('content')
    <h3 class="page-title">
      @lang('global.partners.title')

    @can('partner_create')
      <a href="{{ route('admin.partners.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>
    @endcan
    </h3>
    @can('partner_perma_del')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.partners.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.partners.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
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
                  <li><a href="/admin/partners/project/{{ $project->id }}"><b><u>{{ $project->name }}</u></b></a></li>
                @else
                  <li><a href="/admin/partners/project/{{ $project->id }}">{{ $project->name }}</a></li>
                @endif
              @endforeach
            </ul>
          </div>
          @if($project_name)
              <a class="btn btn-info" href="/admin/partners">Applied filter: "{{ $project_name }}" <u>Click here to remove it</u></a>
          @endif
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('partner_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('partner_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.partners.fields.name')</th>
                        <th>@lang('global.partners.fields.projects')</th>
                        <th>@lang('global.partners.fields.type-of-institution')</th>
                        <th>@lang('global.partners.fields.country')</th>
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
        @can('partner_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.partners.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {

            var project_id='';
            var currentURL = $(location).attr('href');
            if (currentURL.indexOf("project") >= 0) {
              var array = currentURL.split('/');
              project_id = array[6];
            }

            window.dtDefaultOptions.ajax = '{!! route('admin.partners.index') !!}?show_deleted={{ request('show_deleted') }}&project_id=';
            window.dtDefaultOptions.ajax+=project_id;
            window.dtDefaultOptions.columns = [@can('partner_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'name', name: 'name'},
                {data: 'projects.name', name: 'projects.name'},
                {data: 'type_of_institution.name', name: 'type_of_institution.name'},
                {data: 'country.title', name: 'country.title'},

                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
