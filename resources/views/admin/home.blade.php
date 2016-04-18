@extends('admin.layouts.app')

@section('htmlheader_title')
	Administracion
@endsection

@section('contentheader_title')
	Modulo administracion
@endsection
@section('main-content')
	@include('admin.layouts.partials.resumen')
@endsection
