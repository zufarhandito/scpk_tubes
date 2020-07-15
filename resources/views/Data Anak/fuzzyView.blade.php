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
    <h5 class="card-title">Berikut ini merupakan status Adik <b>{{$p->name}}</b></h5>
    <p class="card-text">Nilai Gizi:</p>
    <p class="card-text"><b>{{$hasil}}</b></p>
    <p class="card-text">Status:</p>
    <p class="card-text"><b>{{$adalah}}</b></p>
    <a href="{{ url('home') }}" class="btn btn-primary">Home</a>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>
</div>
@endsection