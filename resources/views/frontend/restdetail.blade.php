<x-frontend> 
     <section class="py-5 bg-light ResMenu">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-3">
            <img src="{{ asset($restaurant->logo) }}" style="height: 200px; border-radius: 50%;" class="img-fluid">
          </div>
          <div class="col-lg-6">
            <h3 class="h4 text-uppercase mb-0">{{ $restaurant->name }} </h3>
            <table class="mt-2">
              <tr>
                <td style="width: 150px;">Opening Hours </td>
                <td>{{ $restaurant->opening_time}}</td>
              </tr>
              <tr>
                <td>Opening Day  </td>
                <td>{{$restaurant->opening_day}}</td>
              </tr>
              <tr>
                <td>Delivery Time </td>
                <td>{{$restaurant->deliver_time}}</td>
              </tr>
              <tr>
                <td>Location  </td>
                <td>{{$restaurant->address}}</td>
              </tr>
            </table>
{{--             <p class="text-muted mb-0"><strong>Opening Hours: </strong> {{ $restaurant->opening_time}}</p>
            <p class="text-muted mb-0"><strong>Opening Day: </strong> {{$restaurant->opening_day}}</p>
            <p class="text-muted mb-0"><strong>Delivery Time: </strong> {{$restaurant->deliver_time}}</p>
            <p class="text-muted mb-0"><strong>Location: </strong> {{$restaurant->address}}</p> --}}
          </div>
          <div class="col-lg-3 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Restaurant</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <div class="container p-0 mt-5">
      <div class="row ResMenu">
        <!-- SHOP SIDEBAR-->
        <div class="col-lg-3 order-2 order-lg-1">
         {{--  <h5 class="text-uppercase mb-4">Categories</h5> --}}
          <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Categories</strong></div>
          <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
            @foreach($restaurant->categories as $category)
              <li class="mb-2">
                <a class="reset-anchor btnCategory" data-id="{{$category->id}}" data-name="{{$restaurant->id}}" style="cursor: pointer; font-size: 15px;">
                  {{$category->name}}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
        <!-- SHOP LISTING-->
        <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
          <div class="row AllMenu">
            <!-- PRODUCT-->

              @foreach($menus as $menu)
              @php 
                $photos = json_decode($menu->photo);
                $photo = $photos[2]; 
              @endphp
                <div class="col-lg-4 col-sm-6 AllMenu">
                  <div class="product text-center">
                    <div class="mb-3 position-relative">
                      <div class="badge text-white badge-"></div><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="{{asset($photo)}}" style="height: 200px;"></a>
                      <div class="product-overlay">
                        <ul class="mb-0 list-inline">
                          <li class="list-inline-item m-0 p-0">
                            <a class="btn btn-sm btn-outline-dark" href="#">
                              <i class="far fa-heart"></i>
                            </a>
                          </li>
                          <li class="list-inline-item m-0 p-0">
                            <a class="btn btn-sm btn-dark addtocartBtn" style="color:white;" data-id="{{$menu->id}}" data-name="{{$menu->name}}" data-price="{{$menu->price}}" data-photo="{{$photo}}" data-codeno="{{$menu->codeno}}"> Add to cart </a>
                          </li>
                          <li class="list-inline-item mr-0">
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('idetail', $menu->id) }}">
                              <i class="fas fa-expand"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <h6> <a class="reset-anchor" href="detail.html"> {{ $menu->name }}</a></h6>
                    <p class="small text-muted"> {{$menu->price}} Kyats </p>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="row CategoryMenu">

            </div>

          
          <!-- PAGINATION-->
{{--           <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center justify-content-lg-end">
              <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
          </nav> --}}
        </div>
      </div>
            <div class="row SearchMenu">

            </div>
    </div>
</x-frontend>