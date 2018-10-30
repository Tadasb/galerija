@extends('layouts.main')
@section('title', 'Parodos')
@section('content')

{{-- @foreach($parodos as $paroda)
	<div class="columns">
		<div class="column ">
			<h1 class="title is-8-tablet is-9-desktop is-10-fullhd">{{ $paroda->name ?? ''}}</h1>
			<h2 class="subtitle is-5">{{ $paroda->short_description ?? ''}}</h2>
		</div>
		<div class="column is-4-tablet is-3-desktop is-2-fullhd">
		    <div class="has-text-right">
	    		<h3 class="title is-5">
	    			{{$paroda->starts_at ?? ''}} /
	    		</h3>
		    </div>
		    <div class="has-text-right">
		    	<h3 class="title is-5">
				    {{$paroda->ends_at?? ''}}
				</h3>
		    </div>
		</div>
	</div>

    <el-carousel indicator-position="none">
    	@foreach($paroda->data->images as $image)
      	<el-carousel-item>
        	<img class="image" src="{{$image->url}}" alt="">
      	</el-carousel-item>
      	@endforeach
    </el-carousel>
	
	<p class="content is-medium">
		{{ $paroda->description ?? ''}}
	</p>

@endforeach --}}

@endsection