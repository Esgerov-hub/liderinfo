@extends('admin.layouts.app')

@section('admin.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .success{
            text-align: center;
            background-color: greenyellow;
            width: 239px;
            height: 40px;
        }
        .error{
            text-align: center;
            background-color: greenyellow;
            width: 239px;
            height: 40px;
        }
    </style>
@endsection
@section('admin.content')


    <div class="page-content">
        <div class="container-fluid">
            @if ( Session::get('errors'))
                <div class="col-12 mt-1">
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">{{ Session::get('errors') }}</div>
                    </div>
                </div>
            @endif
            @if (Session::get('success'))
                <div class="col-12 mt-1">
                    <div class="alert alert-success" role="alert">
                        <div class="alert-body">{{ Session::get('success') }}</div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="body d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">Xəbərlər</h4>
                                <div class="message"></div>
                                <a href="{{ route('admin.news.create') }}" class="ml-auto btn btn-success">Əlavə et</a>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                <tr>
                                    <th>Ad</th>
                                    <th>Status</th>
                                    <th>Düzəliş et</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($news as $data)
                                    <tr>
                                        <td>{{ json_decode($data, true)['title']['az'] }}</td>
                                        <td>
                                            <div class="form-check form-switch mb-3" dir="ltr">
                                                <input class="form-check-input" type="checkbox" id="attribute_status"  name="attribute_status" @if($data['status'] == 1) checked="" @endif onChange="changeStat({{ $data['id'] }},{{ $data['status'] }})">
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-link p-0" href="{{ route('admin.news.edit', $data->id) }}" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="Edit">
                                                <span class="text-500 fas fa-edit"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.news.destroy',$data->id) }}" method="post" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger waves-effect waves-light">
                                                    <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="pagination">
                {!! $news->links() !!}
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@section('admin.js')
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
            var url = '{{ env('APP_URL ') }}/admin/news/status/' + id;
            $.ajax({
                url: `${url}`,
                dataType: 'json',
                data: {
                    status: status,
                    _token: token
                },
                type: 'post',

                success: function(response) {
                    if (response.success == true)
                    {
                        $(".message").append('<div class="btn-success success" >'+response.message+'</div>');
                    }else{
                        $(".message").empty();
                        $.each(response.error, function(index, value) {
                            $(".message").append('<div class="btn-danger error">' + value + '</div>');
                        });
                    }
                },
                error: function(error) {
                    $(".message").append('<div class="btn-danger error">Yenidən cəhd göstərin</div>');
                }
            })
        }
    </script>
@endsection
