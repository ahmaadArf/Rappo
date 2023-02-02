@extends('site.master')
@section('title','Project | '.env('APP_NAME'))
@section('content')
@include('site.part.hero',['name'=>'We create your brand','text'=>'You can aso make your own custom plan model for your business.'])



@include('site.part.process')
@include('site.part.project')


@stop
