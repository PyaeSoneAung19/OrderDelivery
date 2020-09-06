<x-frontend>
        @php 
          $photos = json_decode($menu->photo);
          $photo = $photos[1]; 
        @endphp
	      <section class="py-5">
        <div class="container">
          <div class="row AllMenu">
        <section class="py-5 mb-5 bg-light col-12">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Code No - {{ $menu->codeno }}</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="{{ route('index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Menu Detail </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-sm-0">
                  <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                    @foreach($photos as $img)
                      <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0">
                      	<img class="w-100" src="{{asset($img)}}" style="height: 90px;">
                      </div>
                    @endforeach
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="owl-carousel product-slider" data-slider-id="1">
	                  <a class="d-block" href="" data-lightbox="product" title="Product item 1">

	                  	<img class="img-fluid" src="{{asset($photo)}}" style="height: 288px;">
	                  </a>
	                  {{-- <a class="d-block" href="img/product-detail-2.jpg" data-lightbox="product" title="Product item 2">
	                  	<img class="img-fluid" src="{{asset('Frontend/img/product-detail-2.jpg')}}" alt="...">
	                  </a>
	                  <a class="d-block" href="img/product-detail-3.jpg" data-lightbox="product" title="Product item 3">
	                  	<img class="img-fluid" src="{{asset('Frontend/img/product-detail-3.jpg')}}" alt="...">
	                  </a>
	                  <a class="d-block" href="img/product-detail-4.jpg" data-lightbox="product" title="Product item 4">
	                  	<img class="img-fluid" src="{{asset('Frontend/img/product-detail-4.jpg')}}" alt="...">
	                  </a> --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
              </ul>
              <h1> {{ $menu->name }}</h1>
              <p class="text-muted lead">{{ $menu->price }} Kyats </p>
              <p class="text-small mb-4">
              	{{ $menu->description }}
              </p>
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 addtocartBtn" style="color:white;" data-id="{{$menu->id}}" data-name="{{$menu->name}}" data-price="{{$menu->price}}" data-photo="{{$photo}}" data-codeno="{{$menu->codeno}}">Add to cart</a></div>
              </div>
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white">
                	<strong class="text-uppercase">Restaurant:</strong>
                	<span class="ml-2 text-muted">{{$menu->restaurant->name}}</span>
                </li>
                <li class="px-3 py-2 mb-1 bg-white text-muted">
                	<strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">{{ $menu->category->name }}</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="row SearchMenu">

        </div>
        </div>
      </section>
</x-frontend>