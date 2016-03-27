@extends('profile.layouts.app')

@section('htmlheader_title')
	Perfil - Formación
@endsection

@section('contentheader_title')
	Resumen Formacion
@endsection
@section('main-content')
	@include('profile.education.index')
@endsection
