@extends('admin.layouts.app')

@section('admin.css')
@endsection
@section('admin.content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Tables</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="body d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">Users</h4>
                                <a href="{{ route('admin.user.create') }}" class="ml-auto btn btn-success">Add</a>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $data['name'] }}</td>
                                            <td>{{ $data['surname'] }}</td>
                                            <td>{{ $data['email'] }}</td>
                                            <td>
                                                @foreach ($data->roles as $role)
                                                   <span class="btn btn-secondary">{{ $role->name }}</span> 
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($data->permissions as $permission)
                                                   <span class="btn btn-info">{{ $permission->name }}</span> 
                                                @endforeach
                                            </td>

                                            <td><a class="btn btn-link p-0"
                                                    href="{{ route('admin.user.edit', $data['id']) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span
                                                        class="text-500 fas fa-edit"></span></a></td>
                                            <td><a class="btn btn-link p-0 ms-2" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"><span
                                                        class="text-500 fas fa-trash-alt"></span></a></td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="pagination">
                {{ $users->links() }}
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
