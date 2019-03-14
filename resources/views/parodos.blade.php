@extends('layouts.main')
@section('title', 'Parodos')
@section('content')
<div id="parodos">
	<h1 class="py-3">PARODOS</h1>
		<div class="items">
			@foreach($parodos as $paroda)
			<div class="px-4 item">
				<a class="link no-underline item-link" href="/parodos/{{$paroda->url}}">
					@if(data_get($paroda, 'data.images.0'))
					<div>
						<img class="img-fluid item-picture" src="{{$paroda->data->images[0]->url}}" alt="" style="width: 100%;">
					</div>
					@endif
					<div class="mb-4">
						<div class="py-2 px-1">
							{!!data_get($paroda, 'name')!!}
						</div>
						@if(data_get($paroda, 'starts_at') && data_get($paroda, 'starts_at') > now())
						<div class="py-2 px-1" style="background-color: #555; color: #fff; text-decoration: none!important;" >prasidės <strong>{!!data_get($paroda, 'starts_at')!!}</strong>
						</div>
						@elseif(data_get($paroda, 'ends_at') && data_get($paroda, 'ends_at') > now())
						<div class="py-2 px-1" style="background-color: #333; color: #fff; text-decoration: none!important;" >vyksta iki <strong>{!!data_get($paroda, 'ends_at')!!}</strong>
						</div>
						@elseif(data_get($paroda, 'ends_at') && data_get($paroda, 'ends_at') < now())
						<div class="py-2 px-1" style="background-color: #777; color: #fff; text-decoration: none!important;" >baigėsi <strong>{!!data_get($paroda, 'ends_at')!!}</strong>
						</div>
						@endif					
					</div>
				</a>
			</div>
			@endforeach
		</div>
</div>
@endsection

@section('scripts')
<script>
	new Vue({
		el: '#parodos',
		data: {
			items: {!!$parodos!!},
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