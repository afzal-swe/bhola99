@extends('backend.layouts.app')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Website Setting Table</h1>
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
                          <h3 class="card-title">Website Modify</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Website info Insert</h4>
                                 
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('website.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="">Website Name</label>
                                                <input type="text" name="website_name" class="form-control" value="{{ old('website_name') }}" placeholder="Website Name">
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="">Phone One</label>
                                                <input type="number" name="phone_one" class="form-control" value="{{ old('phone_one') }}" placeholder="Phone One" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Phone Two</label>
                                                <input type="number" name="phone_two" class="form-control" value="{{ old('phone_two') }}" placeholder="Phone Two" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Main Email</label>
                                                <input type="email" name="main_email" class="form-control" value="{{ old('main_email') }}" placeholder="example@gmail.com">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Support Email</label>
                                                <input type="email" name="support_email" class="form-control" value="{{ old('support_email') }}" placeholder="support@gmail.com">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" name="address" class="form-control" placeholder="Address">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" id="summernote" cols="130" rows="10"></textarea>
                                            </div>

                                           
        
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Create</button>
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