@extends('admin.layouts.app')
    
@section('title')
    New Employee
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
                    <h1 class="m-0">New Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">New Employee</li>
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
                <form action="{{ route('admin.employee.add') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                
                    @csrf
                    
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="..." value="{{ old('first_name') }}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="..." value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="..." value="{{ old('email') }}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="..." value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                            <label for="formGroupExampleInput">Company</label>
                            <input type="text" name="company" class="form-control" placeholder="..." value="{{ old('company') }}">
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