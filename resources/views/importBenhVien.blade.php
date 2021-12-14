@extends('layouts.app')

@section('title', 'Import Bệnh Viện')

@section('content')

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Bệnh viện</h3>
                                <p class="text-subtitle text-muted">Import file excel từ bệnh viện</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Trang chủ</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Bệnh viện</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section id="custom-file-input">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">IMPORT</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="col-md-6 mb-1">
                                                @if (isset($status))
                                                    <div class="alert alert-danger" role="alert">{{ $message }}
                                                    </div>
                                                @endif
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ Session::get('success') }}</div>
                                                @endif
                                                <form method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="myfile"
                                                            name="myfile" accept=".xls,.xlsx"
                                                            aria-describedby="inputGroupFileAddon04"
                                                            aria-label="Upload" />
                                                        <button class="btn btn-primary" type="submit"
                                                            id="btn-import-bv">
                                                            Upload
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
@endsection