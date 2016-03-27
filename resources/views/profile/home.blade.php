@extends('profile.layouts.app')

@section('htmlheader_title')
	Perfil
@endsection

@section('contentheader_title')
	Resumen perfil
@endsection
@section('main-content')
	@include('profile.layouts.partials.resumen')
@endsection
