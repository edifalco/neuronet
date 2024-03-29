               <div class="box box-indigo">
                <div class="box-header with-border">
                  <h3 class="box-title">Tools</h3>

{{--                  <div class="box-tools pull-right">--}}
{{--                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
{{--                  </div>--}}
                </div>
                <!-- /.box-header -->
               <div class="box-body">
                 <div class="table-responsive">
                   <table class="table no-margin">
                     <thead>
                     <tr>
                       <th>Publication Date</th>
                       <th>Tool Name</th>
                       <th>Projects</th>
                     </tr>
                     </thead>
                     <tbody>

                      @foreach($tools as $tool)
                        <tr>
                          <td>{{ $tool->publication_date }}</td>
                          <td><a href="/admin/tools/{{ $tool->id }}">{{ $tool->name }}</a></td>
                          <td>
                              @foreach ($tool->projects as $singleProjects)
                                  <span class="label label-info label-many">{{ $singleProjects->name }}</span>
                              @endforeach
                          </td>
                        </tr>
                      @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ route('admin.tools.index') }}" class="uppercase">View All Tools</a>
                </div>
                <!-- /.box-footer -->
              </div>
