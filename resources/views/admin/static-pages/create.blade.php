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
                            <form action="{{ route('admin.static-pages.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <div class="language-container" lang="az" style="display: flex;">
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-ru" class="form-label">Title az</label>
                                                <input class="form-control" type="text" name="title[az]" value="" id="input-az" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-az" class="form-label">Description az</label>
                                                <textarea class="form-control" type="text" name="description[az]" id="input-az"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="language-container" lang="ru" style="display: none;">
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-ru" class="form-label">Title ru</label>
                                                <input class="form-control" type="text" name="title[ru]" value="" id="input-ru">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-ru" class="form-label">Description ru</label>
                                                <textarea class="form-control" type="text" name="description[ru]" id="input-ru"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="language-container" lang="other" style="display: none;">
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-logo" class="form-label">Logo</label>
                                                <input class="form-control" type="file" name="logo" id="input-logo">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-10">
                                                <label for="input-contract" class="form-label">Contract</label>
                                                <select  class="form-control" name="type" >
                                                    <option value="">-sec</option>
                                                    <option value="about">Haqqimizda</option>
                                                </select>
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
