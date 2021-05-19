@extends('layouts.app')

@section('content')
    <h3 class="page-title">Asset Map</h3>

    <div class="asset-image">
        @foreach($asset_maps as $asset_map)
            <div class="{{ $asset_map->target }} || " data-toggle="modal" data-target="#{{ $asset_map->target }}"><span class="asset-title">{{ $asset_map->title }}</span></div>
        @endforeach
    </div>

    <!-- Modal -->
    @foreach($asset_maps as $asset_map)
        <div class="modal fade" id="{{ $asset_map->target }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><img class="modal-img" src="/img/{{ $asset_map->project->logo }}">{{ $asset_map->title }}</h4>
                    </div>
                    <div class="modal-body">
                        {!! $asset_map->body !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-xs-12">
            <div class="whats-an-asset">What is an asset?</div>
            <div class="whats-an-asset-modal hidden">
                <div class="modal-header">
                    <h3 class="modal-title">Defining an asset<img class="modal-img pull-right" src="/img/Neuronet_Logo.png"></h3>
                </div>
                <div class="modal-body">
                    <p>In order to consistently build the asset map across all IMI neurodegeneration projects, NEURONET has agreed on a common definition of what an asset is.</p>

                    <ul>
                        <li><strong>Existence.</strong> An asset must exist. It cannot be a planned or future outcome, or something that no longer
                            exists (e.g. a cohort that existed but is not actively being followed up after project completion)</li>
                        <li><strong>Specificity.</strong> Assets need to be concrete, not a category of results or an abstract description. E.g. “Body of
                            publications” would not be considered an asset.</li>
                        <li><strong>Tangibility.</strong> Data sets, tools, guidelines, a white paper, software, etc. can be considered assets if they can
                            be accessed, incorporated, consulted, or leveraged in some way. "Expertise in XYZ" in general is not
                            tangible, therefore not considered an asset. Also, if a research outcome is not accessible at all, it may not
                            be considered an asset either, as it would not meet the usefulness criteria described below. On the other hand, a site network would meet the tangibility criteria if they use common practices, team dynamics, common protocols, etc.</li>
                        <li><strong>Re-usability.</strong> Assets should be amenable for re-use by others. If something is so ad hoc that it can only be
                            useful for the originating project, it may not be considered an asset.</li>
                        <li><strong>Provenance.</strong> Assets need to be defined by basic parameters such as description, ownership, authorship,
                            location (link for example), access/use conditions, etc. in sufficient detail. If this information is unknown,
                            the asset may not be incorporated into the asset map, as assessment of some of the other criteria would
                            not be possible.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        $(".whats-an-asset").hover(function() {
            $('.whats-an-asset-modal').removeClass('hidden')
        }, function() {
            $('.whats-an-asset-modal').addClass('hidden')
        });
    </script>
@stop
