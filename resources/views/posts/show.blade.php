@extends('layouts.app')


@section('content')


<h1> <a href="{{route('posts.edit' , $post->id)}}"> {{$post->title}}</a></h1>
<p><a href="{{route('posts.edit' , $post->id)}}"> {{$post->content}}</a></p>




@endsection
