@extends('admin.layouts.app')
    
@section('title')
    Companies
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
                    <h1 class="m-0">Companies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div style="float: right">
                <a href="{{ route('admin.company.new') }}" class="btn btn-primary btn-md active" style="margin-right: 40px;" role="button" aria-pressed="true">New company</a>
            </div>
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Website</th>
                        <th scope="col">logo</th>
                        <th scope="col">Actions</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <th scope="row-{{ $company->id }}">{{ $company->id }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <img class="sm-logo" src="{{ asset('images/company/'.$company->logo) }}" alt="{{$company->logo}}" >
                                </td>
                                <td>
                                    <div class="col-4 m-0 p-0">
                                        <form action="{{ route('admin.company.delete') }}" method="POST" style="display: contents;"> {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$company->id}}"> <p data-placement="top" data-toggle="tooltip" title="Delete" class="m-1"><button class="btn btn-danger btn-sm" data-title="Delete" data-target="#delete" onclick="return confirm('Delete Company {{ $company->name }}?')">Delete</button></p>
                                        </form>
                                    </div>
                                    <div class="col-4 m-0 p-0">
                                        <a href="{{ route('admin.company.edit',['id'=>$company->id] ) }}"><p data-placement="top" data-toggle="tooltip" title="Edit" style="float: left" class="m-1"><button class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" >Edit</button></p></a>
                                    </div>
                                        
                                </td>
                            </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
            </div>
            <!-- /.container-fluid -->

            {{-- laravel pagination --}}
            <div class="d-flex justify-content-center">
                {{ $companies->links( "pagination::bootstrap-4") }}
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')

@endsection