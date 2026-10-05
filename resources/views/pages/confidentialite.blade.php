@extends('layouts.app')

@section('title', __('legal.privacy.title'))
@section('description', __('legal.privacy.description'))

@section('content')
@include('partials.page-header', [
    'title' => __('legal.privacy.title'),
    'crumbs' => [__('legal.privacy.crumb') => null],
])

@include('partials.legal-sections', ['page' => 'privacy'])
@endsection
