@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '500')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
