@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SEO Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('backend_home_page') }}"><- Go To Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">SEO Modify</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">SEO Section</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('seo.update',$seo->id) }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                                <label for="">Author</label>
                                                <input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Meta Keyword</label>
                                                <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Meta Description</label>
                                                <input type="text" name="meta_description" class="form-control" value="{{ $seo->meta_description }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Google Analytics</label>
                                                <input type="text" name="google_analytics" class="form-control" value="{{ $seo->google_analytics }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Google Verification</label>
                                                <input type="text" name="google_verification" class="form-control" value="{{ $seo->google_verification }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Alexa Analytics</label>
                                                <input type="text" name="alexa_analytics" class="form-control" value="{{ $seo->alexa_analytics }}">
                                            </div>

                                           
        
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>
  </div>

@endsection