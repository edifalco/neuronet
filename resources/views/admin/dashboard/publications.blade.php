             <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Publications</h3>
    
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
        			 <div class="box-body">
                        @foreach($publications as $publication)
                            <div class="box-footer">
                              <div class="box-comment">
                                <div class="comment-text">
                                      <span class="username text-bold">
                                        {{ $publication->abbr ? $publication->abbr : "anonymous" }}
                                      </span><!-- /.username -->
                                      <span class="text-muted pull-right">{{ $publication->month }}-{{ $publication->year }}</span><br>
                                  <a href="{{ $publication->link }}" target="_blank">{{ $publication->title }}</a>
                                </div>
                                <!-- /.comment-text -->
                              </div>
        
                              <!-- /.box-comment -->
                            </div>
                        @endforeach
                    </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ route('admin.publications.index') }}" class="uppercase">View All Publications</a>
                </div>
                <!-- /.box-footer -->
              </div>