@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">
      @lang('global.partners.title')
      @if($project_name )
         associated with the project "{{ $project_name }}"
      @endif
    </h3>
    @can('partner_create')
    <p>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>

    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.partners.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.partners.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
          Select a project:
            @if($project_name)
              <a class="btn btn-xs btn-purple" href="/admin/partners/">See all partners</a>
            @else
              <a class="btn btn-xs btn-pink" href="/admin/partners/">See all partners</a>
            @endif
          @foreach($projects as $project)
            @if($project->name == $project_name)
              <a class="btn btn-xs btn-pink" href="/admin/partners/project/{{ $project->id }}">{{ $project->name }}</a>
            @else
            <a class="btn btn-xs btn-purple" href="/admin/partners/project/{{ $project->id }}">{{ $project->name }}</a>
            @endif
          @endforeach
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
