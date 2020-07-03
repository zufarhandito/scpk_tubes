@extends('layouts.app')
@section('content')
<!-- {{$p-> name}}
{{$hasil}}
{{$adalah}} -->
<div class="container">
<div class="card text-center">
  <div class="card-header">
    Status gizi Balita
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$p->name}}</h5>
    <p class="card-text">{{$hasil}}</p>
    <p class="card-text">{{$adalah}}</p>
    <a href="{{ url('home') }}" class="btn btn-primary">Home</a>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>
</div>
@endsection