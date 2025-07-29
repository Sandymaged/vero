@extends('layouts.backend.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-md-6">
        <h1 class="m-0 text-bold">{{trans('stock.stock_plural')}} <small class="mx-3">|</small><small>{{trans('stock.stock_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-md-6">
        <ol class="breadcrumb bg-white float-sm-right rounded-pill px-4 py-2 d-none d-md-flex">
          <li class="breadcrumb-item"><a href="{{authUrl('dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item active"><a href="{!! route('stocks.index') !!}">{{trans('stock.stock_plural')}}</a>
          <li class="breadcrumb-item active">{{trans('stock.stock_details')}}</li>
          </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
<div class="card card-outline card-primary">
    <div class="card-header">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link" href="{!! route('stocks.index') !!}"><i class="fa fa-list mr-2"></i>{{trans('stock.stock_table')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{!! route('stocks.create') !!}"><i class="fas fa-plus mr-2"></i>{{trans('stock.stock_create')}}</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="row">

        @include('stocks.show_fields')

        <!-- Back Field -->
        <div class="form-group col-12 text-md-right">
          <a href="{!! route('stocks.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.back')}}</a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection
