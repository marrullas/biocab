@extends('profile.layouts.app')

@section('htmlheader_title')
	Perfil - Experiencia
@endsection

@section('contentheader_title')
	Resumen Experiencia
@endsection
@section('main-content')
	@include('profile.skills.index')
@endsection
