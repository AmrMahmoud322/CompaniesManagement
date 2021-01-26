@extends('admin.layouts.app')
    
@section('title')
    Employees
@endsection

@section('style')
.sm-logo{
    max-height: 100px;
    max-width: 100px;
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
                    <h1 class="m-0">Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div style="float: right">
                <a href="{{ route('admin.employee.new') }}" class="btn btn-primary btn-md active" style="margin-right: 40px;" role="button" aria-pressed="true">New Employee</a>
            </div>
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">logo</th>
                        <th scope="col">Actions</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <th scope="row-{{ $employee->id }}">{{ $employee->id }}</th>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>
                                    <img class="sm-logo" src="{{ asset('images/employee/'.$employee->logo) }}" alt="{{$employee->logo}}">
                                </td>
                                
                                <td>
                                    <div class="col-4 m-0 p-0">
                                        <form action="{{ route('admin.employee.delete') }}" method="POST" style="display: contents;"> {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$employee->id}}"> <p data-placement="top" data-toggle="tooltip" title="Delete" class="m-1"><button class="btn btn-danger btn-sm" data-title="Delete" data-target="#delete" onclick="return confirm('Delete Employee {{ $employee->name }}?')">Delete</button></p>
                                        </form>
                                    </div>
                                    <div class="col-4 m-0 p-0">
                                        <a href="{{ route('admin.employee.edit',['id'=>$employee->id] ) }}"><p data-placement="top" data-toggle="tooltip" title="Edit" style="float: left" class="m-1"><button class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" >Edit</button></p></a>
                                    </div>
                                        
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
            <!-- /.container-fluid -->
            <div class="d-flex justify-content-center">
                {{ $employees->links( "pagination::bootstrap-4") }}
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')

@endsection