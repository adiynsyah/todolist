@extends('layouts.master')

@section('content')


<div class="form-inline">
	<input type="text" class="form-control set-width-text" id="text-todo" placeholder="...">
	<button type="submit" class="btn btn-primary" id="btn-submit">
		<i class="glyphicon glyphicon-plus"></i>
		Add Todo
	</button>
	<span id="type-here">Type in a new todo...</span>
</div>
<br> <br>

<ul class="list-group list-group-hover"></ul>

<script type="text/javascript" src="{{ asset('/js/engine.js') }}"></script>

@endsection