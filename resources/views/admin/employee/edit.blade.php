@extends('admin.layouts.app')
    
@section('title')
    Edit Employee
@endsection

@section('style')
.md-logo{
    max-height: 200px;
    max-width: 200px;
}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
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
                <form action="{{ route('admin.employee.update') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                
                    @csrf
                    <input type="hidden" name="id" value="{{ $employee->id }}">
                    
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="..." value="{{ $employee->first_name }}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="..." value="{{ $employee->last_name }}">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                            <label for="formGroupExampleInput">E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="..." value="{{ $employee->email }}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="..." value="{{ $employee->phone }}">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                            <label for="formGroupExampleInput">Company</label>
                            <input type="text" name="company" class="form-control" placeholder="..." value="{{ $employee->company_id }}">
                        </div>
                        <div class="col">
                            <label for="formGroupExampleInput">Logo</label>
                            <div><input type="file" name="logo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="formGroupExampleInput">Old Logo</label>
                            <div>
                                <img class="md-logo" src="{{ asset('images/employee/'.$employee->logo) }}" alt="{{$employee->logo}}" >
                            </div>
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