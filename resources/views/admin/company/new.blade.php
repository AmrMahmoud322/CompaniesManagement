@extends('admin.layouts.app')
    
@section('title')
    New Company
@endsection

@section('style')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">New Company</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @include('admin.partials.session_messages')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.company.add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                
                    @csrf
                    
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="..." value="{{ old('name') }}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput">E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="..." value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">Website</label>
                            <input type="text" name="website" class="form-control" placeholder="..." value="{{ old('website') }}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput">Logo</label>
                            <div><input type="file" name="logo"></div>
                        </div>
                    </div>
                    <br>
    
                    <button type="submit" class="btn btn-primary">Submit</button>
    
    
                </form>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')

@endsection