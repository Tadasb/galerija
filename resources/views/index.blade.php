@extends('layouts.main')
@section('title', 'Pradinis')
@section('content')

<div class="row py-4">
	<div class="col">
		<div class="page-text">{!!data_get($page, 'data.text')!!}</div>
	</div>
</div>
@endsection