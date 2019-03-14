@extends('layouts.main')
@section('title', 'Menininkai')
@section('content')
	<h1 class="py-3">Menininkai</h1>
	<div class="items">
		@foreach($menininkai as $menininkas)
		<div class="px-4 item">
			<a class="link no-underline item-link" href="/menininkai/{{$menininkas->url}}">
				@if(data_get($menininkas, 'data.images.0'))
				<div>
					<img class="img-fluid item-picture" src="{{$menininkas->data->images[0]->url}}" alt="" style="width: 100%;">
				</div>
				@endif
				<div class="mb-4">
					<div class="py-2 px-1 text-center">
						{!!data_get($menininkas, 'name')!!}
					</div>				
				</div>
			</a>
		</div>
		@endforeach
	</div>

@endsection