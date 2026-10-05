@extends('layouts.app')

@section('title', __('legal.legal.title'))
@section('description', __('legal.legal.description'))

@section('content')
@include('partials.page-header', [
    'title' => __('legal.legal.title'),
    'crumbs' => [__('legal.legal.title') => null],
])

@include('partials.legal-sections', ['page' => 'legal'])
@endsection
