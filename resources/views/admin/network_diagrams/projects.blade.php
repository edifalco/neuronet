@extends('layouts.plugin')

@section('content')
    <div class="nav-tabs-custom" style="cursor: move;">
        <!-- Tabs within a box -->
        <div class="tab-content no-padding">
            <div class="chart tab-pane active">
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding-right: 4%;padding-left: 4%;">
                                <img style="height: 40px;" src="/img/Neuronet_Logo.png" alt="Neuronet Logo">
                                <h4><strong>Interactive project map</strong></h4>
                                <p>This map represents the network of projects in the IMI neurodegeneration (ND) portfolio. Each node in the network represents a single project.</p>
                                <p>By clicking, touching or dragging a project node, you can see how it is connected to other projects. These connections demonstrate that two projects work with the same organisations or institutions.</p>
                                <p>You can pinch or use your mouse wheel to zoom in and out of the map.</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <iframe loading="lazy" src="/plugins/interactive-projects" width="870" height="700"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
