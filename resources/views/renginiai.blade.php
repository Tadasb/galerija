@extends('layouts.main')
@section('title', 'Renginiai')
@section('content')
<div id="renginiai">
	<div class="row pb-4">
		<div class="col page-text">
			<div>{!!data_get($page, 'data.text')!!}</div>
		</div>
	</div>

	<div v-cloak v-if="items.length" class="row pb-4">
		<div class="col d-flex filter">
			<div class="filter-item" :class="{'active-filter' : !filter }" @click="clearFilter()">visos</div>
			<div :class="{'active-filter' : filter === category }" v-cloak v-for="category in Object.keys(categories)" class="filter-item" @click="setFilter(category)">@{{category}}</div>
		</div>
	</div>
	<div v-cloak v-if="filter" class="row">
		<div v-for="(item, i) in filtered" class="col-sm-3" :key="i">
			<a class="link filterable-item" :href="'/renginiai/' + item.url">
				<img v-if="item.data.images" class="img-fluid" :src="item.data.images[0].url" alt="">
				@{{item.name}}
			</a>
		</div>
	</div>
	<div v-else class="row">
		@foreach($renginiai as $renginys)
		<div class="col-sm-3">
			<a class="link" href="/renginiai/{{$renginys->url}}">
				@if(data_get($renginys, 'data.images.0'))
				<img class="img-fluid" src="{{$renginys->data->images[0]->url}}" alt="">
				@endif
				{!!data_get($renginys, 'name')!!}
			</a>
		</div>
		@endforeach
	</div>
</div>
@endsection

@section('scripts')
<script>
	new Vue({
		el: '#renginiai',
		data: {
			items: {!!$renginiai!!},
			filter: null
		},

		methods: {
			setFilter(category) {
				this.filtering = true
				this.filter = category
			},

			clearFilter() {
				this.filtering = false
				this.filter = null
			}
		},

		mounted() {

		},

		computed: {
	        categories() {
	            let categories = {}
	            this.items.forEach(item => {
	                if(item.category) {
	                    if(!categories[item.category]) {
	                        categories[item.category] = []
	                    }

	                    if(item.sub_category && categories[item.category].indexOf(item.sub_category) < 0) {
	                        categories[item.category].push(item.sub_category)
	                    }
	                }
	            })

	            return categories
	        },

	        filtered() {
	        	if(this.filter) {
		        	return this.items.filter(item => item.category === this.filter)
	        	}
	        	else return this.items
	        }
		}
	})
</script>
@endsection