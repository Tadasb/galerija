@extends('layouts.main')

@section('content')

@foreach($shows as $show)
	<div class="columns">
		<div class="column ">
			<h1 class="title is-8-tablet is-9-desktop is-10-fullhd">{{ $show->name ?? ''}}</h1>
			<h2 class="subtitle is-5">{{ $show->short_description ?? ''}}</h2>
		</div>
		<div class="column is-4-tablet is-3-desktop is-2-fullhd">
		    <div class="has-text-right">
	    		<h3 class="title is-5">
	    			{{$show->starts_at_dot ?? ''}} /
	    		</h3>
		    </div>
		    <div class="has-text-right">
		    	<h3 class="title is-5">
				    {{$show->ends_at_dot ?? ''}}
				</h3>
		    </div>

{{-- 		    <div class="has-text-right">
		    	<h3 class="title is-4">
				    {{$show->starting_time ?? ''}}
				</h3>
		    </div> --}}
		</div>
	</div>

    <el-carousel indicator-position="none">
    	@foreach($show->data->pictures as $picture)
      	<el-carousel-item>
        	<img class="image" src="{{$picture->url}}" alt="">
      	</el-carousel-item>
      	@endforeach
    </el-carousel>
	
	<p class="content is-medium">
		{{ $show->description ?? ''}}
	</p>

@endforeach

@endsection