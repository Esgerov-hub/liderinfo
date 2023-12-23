@extends('admin.layouts.app')

@section('admin.css')
    <style>
        body {
            background-color: #fafafa;
        }

        .container {
            margin: 150px auto;
        }

        input[lang="ru"] {
            display: none
        }

        label[lang="ru"] {
            display: none
        }
    </style>
@endsection
@section('admin.content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Form Elements</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Form Elements</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

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
                            <h4 class="card-title-desc">Company Create</h4>
                            <div class="language-section mb-3">
                                <button onclick="switchLanguage('az')" class="btn btn-danger">Azerbaijan</button>
                                <button onclick="switchLanguage('ru')" class="btn btn-info">Russian</button>
                                <button onclick="switchLanguage('other')" class="btn btn-info">Other</button>
                            </div>
                            <form action="{{ route('admin.company.update',$company->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="mb-3 row">
                                    <div class="language-container" lang="az" style="display: flex;">
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-ru" class="form-label">Name az</label>
                                                <input class="form-control" type="text" name="name[az]" value="{{  json_decode($company, true)['name']['az'] }}" id="input-az" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-az" class="form-label">Address az</label>
                                                <input class="form-control" type="text" name="address[az]" value="{{  json_decode($company, true)['address']['az'] }}" id="input-az">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-az" class="form-label">Description az</label>
                                                <textarea class="form-control" type="text" name="description[az]" id="input-az">{{  json_decode($company, true)['description']['az'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="language-container" lang="ru" style="display: none;">
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-ru" class="form-label">Name ru</label>
                                                <input class="form-control" type="text" name="name[ru]" value="{{  json_decode($company, true)['name']['ru'] }}" id="input-ru">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-ru" class="form-label">Address ru</label>
                                                <input class="form-control" type="text" name="address[ru]" value="{{  json_decode($company, true)['address']['ru'] }}" id="input-ru">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-ru" class="form-label">Description ru</label>
                                                <textarea class="form-control" type="text" name="description[ru]" id="input-ru">{{  json_decode($company, true)['description']['ru'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="language-container" lang="other" style="display: none;">

                                        <div class="mb-3 row">
                                            <img src="{{ asset("uploads/companies/logo/".$company->logo) }}" style="max-width: 167px;"/>
                                            <div class="col-md-10">
                                                <label for="input-logo" class="form-label">Logo</label>
                                                <input class="form-control" type="file" name="logo" id="input-logo" value="{{$company->logo}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <li class="breadcrumb-item"> <a href="{{ asset("uploads/companies/contract/".$company->contract) }}" target="_blank">{{$company->contract}}</a></li>
                                            <div class="col-md-10">
                                                <label for="input-contract" class="form-label">Contract</label>
                                                <input class="form-control" type="file" name="contract" id="input-contract" {{$company->contract}}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row  mt-4">
                                        <div class="col-md-" dir="ltr">
                                            <button class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

@section('admin.js')
    <script>
        var selectedLanguage = 'az';

        function switchLanguage(lang) {
            selectedLanguage = lang;
            updateElementVisibility();
        }

        function updateElementVisibility() {
            $('.language-container').each(function() {
                if ($(this).attr("lang") === selectedLanguage) {
                    $(this).css("display", "block");
                } else {
                    $(this).css("display", "none");
                }
            });
        }

        function getInputAndLabelValue() {
            var inputId = "input-" + selectedLanguage;
            var inputValue = $("#" + inputId).val();

            var labelFor = $("label[for='" + inputId + "']");
            var labelValue = labelFor.text();

            alert("Input Value: " + inputValue + "\nLabel Value: " + labelValue);
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var errorDiv = document.getElementById('error-message');
                if (errorDiv) {
                    errorDiv.style.display = 'none';
                }
            }, 2000);
        });
    </script>
@endsection
