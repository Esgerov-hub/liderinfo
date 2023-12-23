@extends('site.layouts.app')
@section('site.css')
@endsection
@section('site.content')
    <section class="block-wrapper">
        <div class="container">
            <div class="row">

                <div class="error-page text-center col">
                    <div class="error-code">
                        <h2><strong>404</strong></h2>
                    </div>
                    <div class="error-message">
                        <h3>Səhifə tapılmadı.</h3>
                    </div>
                    <div class="error-body">
                        <a href="{{ route('site.index') }}" class="btn btn-primary">Geri Qayıt</a>
                    </div>
                </div>

            </div><!-- Row end -->


        </div><!-- Container end -->
    </section>

@endsection
@section('site.js')
@endsection
