@extends('layouts.backend.app')

@section('title', 'Edit About Us')

@section('content')
@section('toolbar')
    @include('layouts.commons.toolbar', ['current' => trans('messages.attributes.About-us'),
'parent' => ['url' => route($guard.'.services.create'), 'name' =>  trans('messages.attributes.settings'),]])
@stop
<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
        <div class="card-title">
            <h3 class="fw-bolder m-0">About Us</h3>
        </div>
    </div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    {!! Form::model($about, [
        'route' => [$guard.'.services.update', $about->id],
        'method' => 'PATCH',
        'class' => 'form',
        'id' => 'kt_form'
    ]) !!}

    <div class="card-body">
        <div class="row mb-6">
               {!! Form::label('title', trans("messages.attributes.Title"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
<div class="col-lg-8 fv-row">
                {!! Form::text('title', null, [
                    'class' => 'form-control '.($errors->has('title') ? 'is-invalid' : '').' form-control-lg form-control-solid',
                    'placeholder' => trans("messages.attributes.title"),
                    'required'
                ]) !!}
                @if ($errors->has('title'))
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                @endif
            </div>
        </div>
        <div class="row mb-6">
             
            {!! Form::label('body', trans("messages.attributes.Body"), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
             <div class="col-lg-8 fv-row">

           
                {!! Form::textarea('name', null, [
                    'class' => 'form-control '.($errors->has('name') ? 'is-invalid' : '').' form-control-lg form-control-solid',
                    'placeholder' => trans("messages.attributes.name"),
                    'required'
                ]) !!}
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-light me-2">{{ trans("messages.discard") }}</button>
        <button type="submit" class="btn btn-primary">{{ trans("messages.save_changes") }}</button>
    </div>

    {!! Form::close() !!}
</div>
@endsection
