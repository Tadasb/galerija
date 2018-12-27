<template>
		<div class="multiple-image-upload__images">
			<draggable :list="images" class="d-flex flex-wrap">
			    <image-upload class="pb-4" v-for="(image, i) in images" 
			    :image_type="image_type" 
			    :image="image" 
			    @updated="updateImage(image)" 
			    @deleted="deleteImage(i)"
			    :key="i">
			    </image-upload>
			</draggable>

		    <image-upload :image_type="image_type" :image="null" @updated="addNewImage"></image-upload>

		</div>
</template>

<script>
	export default {
		props: {
			images: {
				type: Array
			},
			image_type: {
				type: String
			}
		},

		data() {
			return {
				image_index: 0,
				show_image_preview: false
			}
		},

		methods: {
            addNewImage(image) {
            	this.images.push(Object.assign({}, image))
            },

            updateImage(image, image2) {
                console.log(image, image2)
                image = image2
            },

            deleteImage(i) {
                this.images.splice(i, 1)
            }
		},
	}
	
</script>

<style>
	.multiple-image-upload__images {
		display: flex;
		flex-wrap: wrap;
		align-items: flex-start;
		justify-content: flex-start;
	}

	.multiple-image-upload__image {
		padding: 0.3em;
	}
	.file-input {
	    filter: alpha(opacity=0);
	    opacity: 0;
	    display: none;
	}
</style>