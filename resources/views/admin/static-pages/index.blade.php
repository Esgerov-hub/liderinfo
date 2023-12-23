@extends('admin.layouts.app')
@section('admin.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/toastr.min.css') }}">
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
                                <h4 class="card-title">Static Pages</h4>
                                <a href="{{ route('admin.static-pages.create') }}" class="ml-auto btn btn-success">Add</a>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Settings</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($static_pages as $data)
                                        <tr>
                                            <td>{{ json_decode($data, true)['title']['az'] }}</td>
                                            <td>{{ $data['type'] }}</td>
                                            <td><a class="btn btn-link p-0" href="{{ route('admin.company.edit', $data['id']) }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><span
                                                        class="text-500 fas fa-edit"></span></a>

                                                <a class="btn btn-link p-0 ms-2" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"><span
                                                        class="text-500 fas fa-trash-alt"></span></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

{{--            <div class="pagination">--}}
{{--                {!! $job_type->links() !!}--}}
{{--            </div>--}}
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@section('admin.js')
    <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function changeStat(id, status) {
            var token = $("meta[name='_token']").attr('content');
            var url = '{{ env('APP_URL ') }}/admin/company/status/' + id;
            $.ajax({
                url: `${url}`,
                dataType: 'json',
                data: {
                    status: status,
                    _token: token
                },
                type: 'post',
                success: function(data) {
                    toastr.success("Məlumat yeniləndi");
                },
                error: function(data) {
                    toastr.error("Yenidən cəhd göstərin");
                }
            })
        }
    </script>
@endsection
