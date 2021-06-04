<div class="nav-tabs-custom" style="cursor: move;">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right ui-sortable-handle">
      <li class="pull-left header">Interactive Network Maps</li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
              <span id="selected-diagram">Projects </span><span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li role="presentation">
                  <a onClick="diagramMenu(this);" role="menuitem" tabindex="-1" data-toggle="tab" aria-expanded="false"
                     href="#project">Projects
                  </a>
              </li>
              <li role="presentation">
                  <a onClick="diagramMenu(this);" id="participants-diagram" role="menuitem" tabindex="-1"
                     data-toggle="tab" aria-expanded="false" href="#partners">Partners
                  </a>
              </li>
          </ul>
      </li>
    </ul>
    <div class="tab-content no-padding">
      <div class="chart tab-pane active" id="project">
        <div class="box-body">
            <div class="table-responsive network-participants-image">
                <h4>Interactive Projects</h4>
                <a href="/admin/network_maps/projects"><img class="img-responsive" src="/img/interactive_projects.png" alt="Network diagram of projects in the portfolio"></a>
            </div>
        </div>
        <!-- /.box-body -->
      </div>

      <div class="chart tab-pane" id="partners">
        <div class="box-body">
            <div class="table-responsive network-participants-image">
                <h4>Interactive Partners (Academic)</h4>
                <a href="/admin/network_maps/partners"><img class="img-responsive network-participants-image" src="/img/interactive_partners.png" alt="Network diagram of organisations participating in the portfolio"></a>
            </div>
        </div>
        <!-- /.box-body -->
      </div>

    </div>
</div>

@section('javascript')
    <script type="text/javascript">
        $(".network-participants-image").hover(function() {
            $('.network-diagram').removeClass('hidden')
        }, function() {
            $('.network-diagram').addClass('hidden')
        });

        $(function () {
            diagramMenu = function (elm) {
                $('#selected-diagram')[0].innerHTML = $(elm)[0].innerHTML;
            }
        });

        $(".project-name").hover(function () {
            $(this).find(".project-title").toggleClass('hidden')
        });
    </script>
@stop
