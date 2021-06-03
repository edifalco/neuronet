@extends('layouts.app')

@section('content')
    <div class="nav-tabs-custom" style="cursor: move;">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right ui-sortable-handle">
            <li class="pull-left header" style="padding:10px;">Network diagram of projects in the portfolio</li>
        </ul>
        <div class="tab-content no-padding">
            <div class="chart tab-pane active">
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
{{--                                <img class="img-responsive" style="padding-right:10px;padding-bottom:10px;float:left;" src="/img/projects.png" alt="Network diagram of projects in the portfolio">--}}
                                <iframe loading="lazy" src="/plugins/interactive-projects" width="580" height="650"></iframe>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                                <div class="jumbotron">
                                    <p style="padding-right: 4%;padding-left: 4%;">The figure represents the network of IMI projects that form the IMI neurodegeneration portfolio. Each node in the network represents an IMI project. The lines between the nodes are weighted to show the number of organisations that participate in both projects – the wider the connection, the higher the number of shared organisations between projects.</p>
                                    <p style="padding-right: 4%;padding-left: 4%;">Click and drag on a pink circle to highlight a project and see the connections it has between other projects.</p>
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
