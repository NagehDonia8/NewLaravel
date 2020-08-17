@extends('layouts.app')


@section('content')


<h1>Create Post</h1>

<form method = "POST" action="/posts" enctype ="multipart/form-data" accept-charset="UTF-8">


<input type="text" name ="title" placeholder = "Enter title">
<br>
<br>
<input type="text" name ="content" placeholder = "Enter content">
<br>
<br>
<input type="file" name ="path">
<br><br>

<input type="submit" name = "submit">


 


</form>

@if(count($errors)>0)


<div class = "alert alert-danger">

<ul>

@foreach($errors->all()  as $error)

<li>{{$error}}</li>


@endforeach
</ul>
</div>
@endif



@endsection





