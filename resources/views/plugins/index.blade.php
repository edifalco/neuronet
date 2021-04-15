@extends('layouts.app')

@section('content')

	<div id="root">
    	<div class="row">
  	    <div class="col-md-12">
            <div class="box box-pink">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="box-title">Plugins</h3>
                </div>
                <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: auto;">
                    <p>Please find below a list of available plugins.</p>
                    <p>How to display a plugin in your website: Click on the plugin you want to use, the plugin will open in a new page, copy the url and embed it in your website.</p>
                    <a target="_blank" href="/plugins/asset-map">Asset Map Plugin</a><br>
                    <a target="_blank" href="/plugins/decision-tool">Decision Tool Plugin</a><br>
                    <a target="_blank" href="/plugins/deliverables">Deliverables Plugin</a><br>
                    <a target="_blank" href="/plugins/documents">Documents Plugin</a><br>
                    <a target="_blank" href="/plugins/events">Events Plugin</a><br>
                    <a target="_blank" href="/plugins/metrics">Metrics Plugin</a><br>
                    <a target="_blank" href="/plugins/network-diagrams">Network Diagrams Plugin</a><br>
                    <a target="_blank" href="/plugins/partners">Partners Plugin</a><br>
                    <a target="_blank" href="/plugins/projects">Projects Plugin</a><br>
                    <a target="_blank" href="/plugins/publications">Publications Plugin</a><br>
                    <a target="_blank" href="/plugins/schedule">Schedule Plugin</a><br>
                    <a target="_blank" href="/plugins/tools">Tools Plugin</a><br>

                </div>
                <!-- /.chat -->
            </div>
      	</div>
     </div>
  </div>

@endsection
