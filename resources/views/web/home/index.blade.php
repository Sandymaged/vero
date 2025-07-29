@extends('layouts.web.app')

@section('title')
    Home
@stop

@section('content')

    @push('css')
    @endpush

    @include('web.home.partials._slider3')

    {{--    @include('web.home.partials._feature') --}}

    @include('web.home.partials._about')

    @include('web.home.partials._category')
    {{-- @include('web.home.partials._brands') --}}
    @include('web.home.partials._partners')

    {{-- @include('web.home.partials._product') --}}

    {{--    @include('web.home.partials._client') --}}

    {{--    @include('web.home.partials._video') --}}

    @push('scripts_lib')
    @endpush

@endsection

@push('scripts_lib')
    <script src="{{ asset('portal/assets' . (isRTL() ? '/rtl/' : '')) }}/js/custom.js"></script>
@endpush
