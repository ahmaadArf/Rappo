@extends('site.master')
@section('title','Service | '.env('APP_NAME'))
@section('content')
@include('site.part.hero',['name'=>'Web & Cloud services','text'=>'Wed love to talk about how we can help you.'])

@include('site.part.service')
@include('site.part.services-2')
@include('site.part.process')
@stop
