@extends('layouts.main')
@section('title'){{$menininkas->name}}@endsection
@section('content')

<div class="row">
	<div class="col-sm-6">
		<h1 class="m-0 p-0">{{$menininkas->name}}</h1>
		<div>
			{!!$menininkas->description!!}
		</div>
	</div>
	<div class="col-sm-6">
		@if(data_get($menininkas, 'data.images.0'))
		<img class="img-fluid" src="{{$menininkas->data->images[0]->url}}" alt="">
		@endif
	</div>
</div>

@endsection

