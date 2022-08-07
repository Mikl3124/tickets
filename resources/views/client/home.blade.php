@extends('layouts.master')
@section('content')
<div class="text-center">
  <h1>Bienvenue {{ Auth::user()->firstname }}</h1>
</div>
@endsection
@section('scripts')
@parent

@endsection
