<x-backend>
	@php
		$restaurantcategories = $restaurant->categories;
	@endphp
	<div class="main-content">
		<div class="section__content section__content--p30">
		    <div class="container-fluid">
		    	<div class="row">
					<div class="col-md-12 mb-2">
						<div class="overview-wrap">
							<h2 class="title-1">Food Order </h2>
							<a class="au-btn au-btn-icon au-btn--blue" href="{{ route('restaurant.index')}}">
								<i class="zmdi zmdi-plus"></i> Back </a>
						</div>
					</div>
				</div>
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="card">
		                    <div class="card-header">
		                        <h3> Editing Restaurant </h3>
		                    </div>
		                    <form action="{{ route('restaurant.update',$restaurant->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			                    @csrf
			                    @method('PUT')

			                     <input type="hidden" name="oldLogo" value="{{$restaurant->logo}}">


			                    <div class="card-body card-block">
		                            <div class="row form-group">
		                                <div class="col col-md-3">
		                                    Name
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    <input type="text" name="name" class="form-control" value="{{$restaurant->name}}">
		                                </div>
		                            </div>

		                            <div class="row form-group">

		                            <div class="col-12">
		                            <ul class="nav nav-tabs" id="myTab" role="tablist">
	                                  <li class="nav-item" role="presentation">
	                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldlogo" role="tab" aria-controls="home" aria-selected="true">Old Logo</a>
	                                  </li>
	                                  <li class="nav-item" role="presentation">
	                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newlogo" role="tab" aria-controls="profile" aria-selected="false">New Logo</a>
	                                  </li>
	                                </ul>
	                            	</div>
		                            <div class="tab-content mt-3" id="myTabContent">
	                                  <div class="tab-pane fade show active" id="oldlogo" role="tabpanel" aria-labelledby="home-tab">
	                                    <img src="{{ asset($restaurant->logo) }}" width="300" class="img-fluid ml-3">
	                                  </div>
	                                  <div class="tab-pane fade" id="newlogo" role="tabpanel" aria-labelledby="profile-tab">
	                                      <input type="file" name="logo" class="form-control-file ml-5">
	                                  </div>
	                                </div>
{{-- 		                                <div class="col col-md-3">
		                                    Logo
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    <input type="file" name="logo" class="form-control-file">
		                                </div> --}}

		                            </div>
		                            <div class="row form-group">
		                                <div class="col col-md-3">
		                                    Phone
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    <input type="text" name="phone" class="form-control" value="{{ $restaurant->phone }}">
		                                </div>
		                            </div>
		                            <div class="row form-group">
		                                <div class="col col-md-3">
		                                    Address
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    <textarea class="form-control" name="address">{{ $restaurant->address }}</textarea>
		                                </div>
		                            </div>
		                            <div class="row form-group">
		                                <div class="col col-md-3">
		                                    Delivery Time
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    <input type="text" name="deliver_time" class="form-control" value="{{ $restaurant->deliver_time}}">
		                                </div>
		                            </div>
		                            <div class="row form-group">
		                                <div class="col col-md-3">
		                                    Township
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    <select name="township_id" class="form-control col-4">
		                                    	<option> Choose Township </option>
		                                    	@foreach($townships as $township)
		                                    		<option value="{{ $township->id}}" @if($restaurant->township_id == $township->id) {{'selected'}} @endif> {{ $township->name }} </option>
		                                    	@endforeach
		                                    </select>
		                                </div>
		                            </div>
		                            <div class="row form-group">
		                                <div class="col col-md-3">
		                                    Cuisine
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    <select name="cuisine_id" class="form-control col-4">
		                                    	<option> Choose Cuisine </option>
		                                    	@foreach($cuisines as $cuisine)
		                                    		<option value="{{ $cuisine->id }}" @if($restaurant->cuisine_id == $cuisine->id) {{'selected'}} @endif> {{ $cuisine->name }} </option>
		                                    	@endforeach
		                                    </select>
		                                </div>
		                            </div>
		                            <div class="row form-group">
		                                <div class="col col-md-3">
		                                    Category
		                                </div>
		                                <div class="col-12 col-md-9">
		                                    {{-- <select name="category_id" class="form-control col-4">
		                                    	<option> Choose Category </option>
		                                    	@foreach($categories as $category)
		                                    		<option value="{{ $category->id}}" @if($restaurant->category_id == $category->id) {{'selected'}} @endif> {{ $category->name }} </option>
		                                    	@endforeach
		                                    </select> --}}
		                                    <select class="js-example-basic-multiple form-control" name="category_id[]" multiple="multiple">
											 <option> Choose Category </option>
		                                    	@foreach($categories as $category)
		                                    		<option value={{ $category->id}} 
		                                    			@foreach($restaurantcategories as $key=>$value)
		                                    			@if($category->id == $value->pivot->category_id)
		                                    				{{"selected"}}
		                                    			@endif
		                                    			@endforeach> {{ $category->name }} </option>
		                                    	@endforeach
											</select>
		                                </div>
		                            </div>
			                    </div>
			                    <div class="card-footer">
			                        <button type="submit" class="btn btn-dark btn-sm px-4 pt-2">
			                            Update
			                        </button>
			                    </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-12">
		                <div class="copyright">
		                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
	@section('script_content')
		<script type="text/javascript">
			
			$(document).ready(function(){
				$('.js-example-basic-multiple').select2();
			});
		</script>
	@endsection
</x-backend>