@extends('profile.layouts.app')

@section('htmlheader_title')
	Perfil -  Datos básicos
@endsection

@section('contentheader_title')
	Resumen Datos básicos
@endsection
@section('main-content')
	@include('profile.bio.index')
@endsection
