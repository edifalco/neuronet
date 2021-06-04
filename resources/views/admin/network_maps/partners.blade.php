@extends('layouts.app')

@section('content')
    <div class="nav-tabs-custom" style="cursor: move;">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right ui-sortable-handle">
            <li class="pull-left header" style="padding:10px;">Interactive Partners</li>
        </ul>
        <div class="tab-content no-padding">
            <div class="chart tab-pane active">
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">

                                <iframe loading="lazy" src="https://test-kb.imi-neuronet.org/plugins/interactive-partners" width="1380" height="650"></iframe>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
