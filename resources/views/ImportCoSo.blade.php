
@extends('layouts.app')

@section('title', 'Import Cơ Sở')

@section('content')

        <div id="main-content">
          <div class="page-heading">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>Cơ sở</h3>
                  <p class="text-subtitle text-muted">Import file excel từ cơ sở</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.html">Trang chủ</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Cơ sở</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            <section id="custom-file-input">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- Button Import -->
                    <div class="card-header">
                      <h4 class="card-title">IMPORT</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                        @if (Session::has('message'))
                          <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
                        @endif
                          @foreach ($list as $donvi)
                            <div class="col-md-6 mb-3">
                            {{ $donvi->TenDonVi }}
                              <form method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="input-group">
                                  <input type="hidden" name="Id" value="{{ $donvi->Id }}"/>
                                  <input
                                    type="file"
                                    class="form-control"
                                    id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04"
                                    aria-label="Upload"
                                    name="myFile"
                                    accept=".xls,.xlsx"
                                  />
                                  <button class="btn btn-primary" type="submit" id="import-quynhon">
                                    View
                                  </button>
                                </div>
                              </form>
                            </div>
                          @endforeach
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
