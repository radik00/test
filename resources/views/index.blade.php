@extends('layouts.master')
@section('content')
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">

      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
     
    @foreach($articles as $article)

      <div class="col-md-4">
        <h2>{{$article->title}}</h2>
        <p><img src='{{$article->img}}' width="100px";></p>
        <p>{{$article->description}}</p>
        <p><a class="btn btn-secondary" href="{{route('articleShow',['id'=>$article->id])}}" role="button">View details &raquo;</a></p>

      </div>

  @endforeach
    </div>
    <hr>
  </div> <!-- /container -->
</main>
@endsection
