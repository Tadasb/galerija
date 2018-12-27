@extends('layouts.main')
@section('title'){{$dizainas->name}}@endsection
@section('content')

<div class="row py-4">
	<div class="col-sm-6">
		<h1>{{$dizainas->name}}</h1>
		<div class="pb-4">
			{!!$dizainas->description!!}
		</div>
	</div>
	<div class="col-sm-6">
		@if(data_get($dizainas, 'data.images.0'))
		<img class="img-fluid" src="{{$dizainas->data->images[0]->url}}" alt="">
		@endif
	</div>
</div>

@endsection

