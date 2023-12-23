@extends('admin.layouts.app')
@section('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css">
@endsection
@section('admin.content')
    <div class="page-content">
        <div class="container-fluid">
            @if ( Session::get('errors'))
                <?php
                $errors = Session::get('errors');
                if ($errors) {
                foreach ($errors->all() as $error) {
                ?>
                <div class="col-12 mt-1">
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">{{ $error }}</div>
                    </div>
                </div>
                <?php } } ?>
            @endif
            @if (Session::get('success'))
                <div class="col-12 mt-1">
                    <div class="alert alert-success" role="alert">
                        <div class="alert-body">{{ Session::get('success') }}</div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Xəbər əlavə et</h4>
                            <form action="{{ route('admin.news.update',$news->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')
                            <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    {{--                                @if(!empty($translations))--}}
                                    {{--                                    @foreach($translations as $key => $lang)--}}
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link {{--@if(++$key ==1)--}} active {{--@endif--}}" data-bs-toggle="tab" href="#az" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Az{{--{{$lang->code}}--}}</span>
                                        </a>
                                    </li>
                                    {{--                                    @endforeach--}}
                                    {{--                                @endif--}}
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#other" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Other</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    {{--@if(!empty($translations))
                                        @foreach($translations as $key => $lang)--}}
                                    <div class="tab-pane {{--@if(++$key ==1)--}} active {{--@endif--}}" id="az" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="title">Başlıq</label>
                                                    <input type="text" class="form-control" id="title"   name="title[az]" value="{{ json_decode($news, true)['title']['az'] }}" placeholder="Başlıq...">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">

                                                    <label for="title">Qısa Mətn</label>
                                                    <textarea class="form-control" rows="2" name="text[az]" placeholder="Mətn...">{{ json_decode($news, true)['text']['az'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="text">Mətn</label>
                                                    <textarea class="summernote-height form-control" rows="2" name="full_text[az]" placeholder="Mətn...">{{ json_decode($news, true)['full_text']['az'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--@endforeach
                                @endif--}}
                                    <div class="tab-pane" id="other" role="tabpanel">
                                        <div class="row">
                                            <div class="mb-3">
                                                <img src="@if(isset($news->image)) {{asset('uploads/newsimage/'.$news->image) }} @else {{ asset('user/user.png') }} @endif" style="max-width: 11%;border-radius: 50%;">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="image">Şəkil</label>
                                                    <input type="file" class="form-control" id="image" name="image" >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="image">Kateqorya</label>
                                                    <select id="category_id" name="category_id" class="form-control">
                                                        <option value="">-Seçin</option>
                                                        @if(!empty($categories))
                                                            @foreach($categories as $cat)
                                                                <option value="{{$cat['id']}}" @if($news->category_id == $cat['id']) selected @endif>{{ json_decode($cat, true)['name']['az'] }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            {{--                                        <div class="col-lg-6">--}}
                                            {{--                                            <div class="mb-3">--}}
                                            {{--                                                <label for="image">Video</label>--}}
                                            {{--                                                <input type="file" class="form-control" id="video" name="video" >--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}
                                        </div>
                                    </div>
                                    <div class="mb-3 row  mt-4">
                                        <div class="col-md-" dir="ltr">
                                            <button class="btn btn-success" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection

@section('admin.js')
    <script src="{{ asset('admin/assets/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/summernote/editor_summernote.js') }}"></script>
@endsection
