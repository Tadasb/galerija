@extends('layouts.main')
@section('title', 'Pradinis')
@section('content')

<div class="row">
	<div class="col">
		<div>{!!data_get($page, 'data.text')!!}</div>
	</div>
</div>
@endsection