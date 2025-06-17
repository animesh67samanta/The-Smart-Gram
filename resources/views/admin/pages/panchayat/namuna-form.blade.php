@extends('admin.layouts.main')
@section('title', 'Namuna No 8 Year')
@section('content')
  <div class="wrapper">
    <div class="page-wrapper">
      <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Panchayat</div>
          <div class="ps-3">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Namuna no.8 Form</li>
                  </ol>
              </nav>
          </div>
        </div>
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <ul class="mb-0">
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif
        <div class="row">
          <div class="col-xl-9 mx-auto">
              <div class="card">
                  <div class="card-body">
                    <form id="namunaForm" action="{{ route('admin.namuna.form.save') }}" method="POST">
                      @csrf
                      @if (!empty($namunaForm))
                            <input type="hidden" name="id" id="id" value="{{ $namunaForm->id }}">
                        @endif
                      <div class="row mt-4">
                        <div class="row text-center text-warning mb-3"><strong><u>Namuna Year Range</u></strong></div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Start Year Before</label>
                                <input type="number" name="start_year_before" class="form-control" min="1900" max="2099" value="{{ old('start_year_before', $namunaForm->start_year_before ?? '') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">End Year Before</label>
                                <input type="number" name="end_year_before" class="form-control" min="1900" max="2099" value="{{ old('end_year_before', $namunaForm->end_year_before ?? '') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Start Year After</label>
                                <input type="number" name="start_year_after" class="form-control" min="1900" max="2099" value="{{ old('start_year_after', $namunaForm->start_year_after ?? '') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">End Year After</label>
                                <input type="number" name="end_year_after" class="form-control" min="1900" max="2099" value="{{ old('end_year_after', $namunaForm->end_year_after ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success text-center" type="submit">Save</button>
                    </form>
                                
                                

                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection