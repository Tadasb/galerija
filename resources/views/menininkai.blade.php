@extends('layouts.main')
@section('title', 'Menininkai')
@section('content')

<div class="row">
	@foreach($menininkai as $menininkas)
	<div class="col-sm-4">
		<a class="link" href="/menininkai/{{$menininkas->url}}">
			<div class="p-2">
				@if($menininkas->data->images[0])
				<img class="img-fluid rounded-circle artist-image" src="{{$menininkas->data->images[0]->url}}" alt="">
				@endif
				<div class="text-center">
					<h2>{{$menininkas->name}}</h2>
				</div>
			</div>
		</a>
	</div>
	@endforeach
</div>

@endsection