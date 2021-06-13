@extends('layouts.app')

@section('content')
    <div class="nav-tabs-custom" style="cursor: move;">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right ui-sortable-handle">
            <li class="pull-left header" style="padding:10px;">Network diagram of organisations participating in the portfolio</li>
        </ul>
        <div class="tab-content no-padding">
            <div class="chart tab-pane active">
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
{{--                                <img class="img-responsive" style="padding-right:10px;padding-bottom:10px;float:left;" src="/img/participants.png" alt="Network diagram of organisations participating in the portfolio">--}}
                                <iframe loading="lazy" src="/plugins/efpia-partners" width="580" height="650"></iframe>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                                <div class="jumbotron">
                                    <p style="padding-right: 4%;padding-left: 4%;">The figure represents the network of unique partner organisations that participate in the 18 projects of the IMI neurodegeneration portfolio (N=239). Each organisation is represented by a single node.</p>
                                    <p style="padding-right: 4%;padding-left: 4%;">Click and drag on a pink circle to highlight a participating organisation and see the connections it has between other organisations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
