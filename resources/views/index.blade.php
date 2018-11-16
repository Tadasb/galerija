@extends('layouts.main')
@section('title', 'Pradinis')
@section('content')

<div class="row">
	<div class="col page-text">
		<div>{!!data_get($page, 'data.text')!!}</div>
	</div>
</div>
@endsection