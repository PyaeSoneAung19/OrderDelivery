<x-frontend>
	<section class="pt-5">

	  <div class="container">
	  	<div class="row AllMenu">
		  	<section class="py-5 mb-5 bg-light col-12">
	          <div class="container">
	            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
	              <div class="col-lg-6">
	                <h1 class="h2 text-uppercase mb-0"> {{$restaurants[0]->township->name}} <small>Township</small> </h1>
	              </div>
	              <div class="col-lg-6 text-lg-right">
	                <nav aria-label="breadcrumb">
	                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
	                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page"> Township </li>
	                  </ol>
	                </nav>
	              </div>
	            </div>
	          </div>
	        </section>
	  	@foreach($restaurants as $restaurant)
		    <div class="col-md-4 mb-4 mb-md-0">
		      <a class="category-item mb-4" href="{{ route('detail',$restaurant->id)}}">

		        <img class="img-fluid" src="{{asset($restaurant->logo)}}" alt="" style="width: 100%; height: 250px;">
		        <strong class="category-item-title">{{ $restaurant->name }}</strong>
		      </a>
		    </div>
	   @endforeach
	  </div>
	  <div class="row SearchMenu">

	   </div>
	  </div>
	</section>
</x-frontend>