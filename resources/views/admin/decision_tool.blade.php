@extends('layouts.app')

@section('content')
    <div class="container-fixed">
        <div id="decision-root">
            <div class="row text-center">
                <div class="col-xs-3">
                    <div class="decision-column-1">
                        <div class="decision-header">ADDITIONAL RESOURCES</div>
                        <div class="decision-body">
                            <div class="decision-menu">
                                <div class="decision-item">
                                    <div class="decision-subheader"><strong>KEY AGENCIES</strong></div>
                                    <p class="decision-hta-bodies" data-toggle="modal" data-target="#decision-hta-bodies">National HTA bodies</p>
                                    <p class="decision-national-regulatory" data-toggle="modal" data-target="#decision-national-regulatory">National Regulatory Agencies</p>
                                    <p class="decision-european-medicines" data-toggle="modal" data-target="#decision-european-medicines">European Medicines Agency</p>
                                    <p class="decision-european-network" data-toggle="modal" data-target="#decision-european-network">European Network for Health Technology Assessment (EUnetHTA)</p>
                                    <p class="decision-finose" data-toggle="modal" data-target="#decision-finose">FINOSE</p>
                                </div>
                            </div>
                            <div class="decision-menu">
                                <div class="decision-item">
                                    <div class="decision-subheader"><strong>ND & OTHER RELATED GUIDANCE DOCUMENTS</strong></div>
                                    <p class="decision-ema-guidance" data-toggle="modal" data-target="#decision-ema-guidance">EMA guidance</p>
                                    <p class="decision-ema-qualification" data-toggle="modal" data-target="#decision-ema-qualification">EMA Qualification opinions and letters of support</p>
                                    <p class="decision-ema-methodology" data-toggle="modal" data-target="#decision-ema-methodology">EUnetHTA Methodology Guidelines</p>
                                </div>
                            </div>
                            <div class="decision-menu">
                                <div class="decision-item">
                                    <div class="decision-subheader"><strong>USEFUL LINKS</strong></div>
                                    <p class="decision-key-organisations" data-toggle="modal" data-target="#decision-key-organisations">Key organisations</p>
                                    <p class="decision-tools" data-toggle="modal" data-target="#decision-tools">Tools & Resources</p>
                                    <p class="decision-key-projects" data-toggle="modal" data-target="#decision-key-projects">Key projects</p>
                                </div>
                            </div>
                            <div class="decision-menu">
                                <div class="decision-item">
                                    <div class="decision-subheader"><strong>CASE STUDIES</strong></div>
                                    <p class="decision-ema-innovation" data-toggle="modal" data-target="#decision-ema-innovation">EMA Innovation Task Force</p>
                                    <p class="decision-ema-qualification-novel" data-toggle="modal" data-target="#decision-ema-qualification-novel">EMA Qualification of Novel Methodologies</p>
                                    <p class="decision-ema-scientific-advice" data-toggle="modal" data-target="#decision-ema-scientific-advice">EMA Scientific Advice</p>
                                    <p class="decision-ema-parallel" data-toggle="modal" data-target="#decision-ema-parallel">Parallel Scientific Advice: EMA-HTA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="decision-column-2">
                        <div class="decision-header">RELEVANT APPROACH FOR ENGAGEMENT WITH EUROPEAN REGULATORY AND HTA BODIES</div>
                        <div>
                            <div class="decision-classify">CLASSIFY STAGE OF RESEARCH<div>EARLY / MID / LATE</div></div>
                            <div class="decision-classify-arrow"></div>
                            <div class="decision-stages-image"><img src="/img/decision_tool4_stages.png" class="img-responsive"></div>
                        </div>
                        <div class="decision-processes-row">
                            <div class="decision-processes-column-1">
                                <div class="decision-processes" data-toggle="modal" data-target="#decision-processes">PROCESSES & PROCEDURES FOR REGULATORY AND HTA INTERACTIONS IN NEW RESEARCH</div>
                                <div>
                                    <div class="decision-hta">HTA</div>
                                    <div class="decision-joint">JOINT / PARALLEL</div>
                                    <div class="decision-regulatory">REGULATORY</div>
                                </div>
                                <div>
                                    <div class="decision-hta-arrow"></div>
                                    <div class="decision-joint-arrow"></div>
                                    <div class="decision-regulatory-arrow"></div>
                                </div>
                            </div>
                            <div class="decision-processes-column-2">
                                <div class="decision-innovation" data-toggle="modal" data-target="#decision-innovation">INNOVATION TASK FORCE</div>
                                <div class="decision-priority" data-toggle="modal" data-target="#decision-priority">PRIORITY MEDICINES SCHEME</div>
                                <div class="decision-procedures" data-toggle="modal" data-target="#decision-procedures">PROCEDURES TO SUPPORT EARLY ACCESS</div>
                                <div class="decision-sme" data-toggle="modal" data-target="#decision-sme">SME SUPPORT</div>
                                <div class="decision-academic" data-toggle="modal" data-target="#decision-academic">ACADEMIC SUPPORT</div>
                                <div class="decision-scientific">
                                    <div class="decision-advice-group">
                                        <div class="decision-advice" data-toggle="modal" data-target="#decision-advice">SCIENTIFIC ADVICE PROCEDURES</div>
                                        <div class="decision-protocol">
                                            <div class="decision-protocol-assistance">SCIENTIFIC ADVICE & PROTOCOL ASSISTANCE</div>
                                            <div class="col-xs-9 decision-ema-group">
                                                <div class="decision-ema">EMA</div>
                                                <div class="row">
                                                    <div class="col-xs-2 decision-ema-scientific" data-toggle="modal" data-target="#decision-ema-scientific">SCIENTIFIC ADVICE</div>
                                                    <div class="col-xs-2 decision-ema-protocol" data-toggle="modal" data-target="#decision-ema-protocol">PROTOCOL ASSISTANCE</div>
                                                    <div class="col-xs-6 decision-ema-qualification-methodologies" data-toggle="modal" data-target="#decision-ema-qualification-methodologies">QUALIFICATION OF NOVEL METHODOLOGIES</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-3 decision-natural" data-toggle="modal" data-target="#decision-natural">NATIONAL REGULATORS</div>
                                            <div class="row decision-parallel-group">
                                                <div class="col-xs-3 decision-fda" data-toggle="modal" data-target="#decision-fda">PARALLEL EMA-FDA</div>
                                                <div class="col-xs-3 decision-eunet" data-toggle="modal" data-target="#decision-eunet">PARALLEL EMA-EUnetHTA (EU)</div>
                                                <div class="col-xs-4 decision-reg" data-toggle="modal" data-target="#decision-reg">JOINT NATIONAL REG-HTA</div>
                                            </div>
                                            <div class="col-xs-4 decision-national" data-toggle="modal" data-target="#decision-national">NATIONAL HTAs</div>
                                        </div>
                                    </div>
                                    <div class="row decision-post-group">
                                        <div class="decision-post-launch" data-toggle="modal" data-target="#decision-post-launch">POST-LAUNCH SCIENTIFIC ADVICE</div>
                                        <div>
                                            <div class="col-xs-3 decision-post-ema">EMA</div>
                                            <div class="col-xs-4 decision-post-regulators">NATIONAL REGULATORS</div>
                                            <div class="col-xs-3 decision-post-htas">NATIONAL HTAs</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="decision-guidance" data-toggle="modal" data-target="#decision-guidance">HTA GUIDANCE FOR SUBMISSIONS</div>
                                <div class="decision-informal" data-toggle="modal" data-target="#decision-informal">INFORMAL HTA ADVICE ON MARKET ACCESS AND EVIDENCE OUTCOMES</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="decision-tool-image"></div>
                </div>
            </div>
        </div>
    </div>

    @foreach($decision_tools as $decision_tool)

        <!-- Modal -->
        <div class="modal fade" id="{{ $decision_tool->target }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ $decision_tool->title }}</h4>
                    </div>
                    <div class="modal-body">
                        {!! $decision_tool->body !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
                <script>
                    import ClassName
                        from "../../../public/adminlte/plugins/datatables/extensions/Responsive/examples/initialisation/className.html";
                    export default {
                        components: {ClassName}
                    }
                </script>
