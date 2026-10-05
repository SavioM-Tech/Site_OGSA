@extends('errors.layout')

@section('title', __('site.errors.500.title'))
@section('code', '500')
@section('message', __('site.errors.500.title'))
@section('details', __('site.errors.500.text'))
