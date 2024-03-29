@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.tools.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.tools.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.tools.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('projects', trans('global.tools.fields.projects').'*', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-projects">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-projects">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('projects[]', $projects, old('projects'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-projects' , 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('projects'))
                        <p class="help-block">
                            {{ $errors->first('projects') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('publication_date', trans('global.tools.fields.publication-date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('publication_date', old('publication_date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('publication_date'))
                        <p class="help-block">
                            {{ $errors->first('publication_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type_of_data_available', trans('global.tools.fields.type-of-data-available').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('type_of_data_available', old('type_of_data_available'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type_of_data_available'))
                        <p class="help-block">
                            {{ $errors->first('type_of_data_available') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('global.tools.fields.description').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('keywords', trans('global.tools.fields.keywords').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('keywords', old('keywords'), ['class' => 'form-control ', 'placeholder' => 'Separate keywords with commas', 'required' => '']) !!}
                    <p class="help-block">Separate keywords with commas</p>
                    @if($errors->has('keywords'))
                        <p class="help-block">
                            {{ $errors->first('keywords') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('link', trans('global.tools.fields.link').'', ['class' => 'control-label']) !!}
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });

        });
        $("#selectbtn-projects").click(function(){
            $("#selectall-projects > option").prop("selected","selected");
            $("#selectall-projects").trigger("change");
        });
        $("#deselectbtn-projects").click(function(){
            $("#selectall-projects > option").prop("selected","");
            $("#selectall-projects").trigger("change");
        });
    </script>

@stop
