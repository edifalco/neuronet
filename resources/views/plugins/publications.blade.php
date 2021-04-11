@extends('layouts.plugin')

@section('content')

    <div id="root">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-purple">
                <div class="box-header with-border">
                  <h3 class="box-title">Publications</h3>
                </div>
                <!-- /.box-header -->
        			 <div class="box-body">

                @foreach($publications as $publication)
                  <div class="box-footer">
                    <div class="box-comment">
                      <div class="comment-text">
                            <span class="username text-bold">{{ $publication->first_author_last_name }}</span> et al., {{ $publication->year }}</span>
                            <span class="pull-right">{{ $publication->project->name }}</span><br>
                        <a href="/admin/publications/{{ $publication->id }}">{{ $publication->title }}</a>
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
            </div>
        </div>
    </div>

@endsection
