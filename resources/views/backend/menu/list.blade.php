<x-backend>
    <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
	                <div class="row">
						<div class="col-md-12 mb-2">
							<div class="overview-wrap">
								<h2 class="title-1">Food Order </h2>
								<a class="au-btn au-btn-icon au-btn--blue" href="{{ route('menu.create')}}">
									<i class="zmdi zmdi-plus"></i>Add Menu</a>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="col-lg-12">
                            @if(session('successMsg')!=NULL)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>SUCCESS!</strong> 
                                      {{session('successMsg')}}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table" id="dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Photo</th>
                                            <th>Code No</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-light text-dark">
                                    	@php $i=1; @endphp
                                        @foreach($menus as $menu)

                                            @php

                                                $photos = json_decode($menu->photo);
                                        

                                                $photo = $photos[0];


                                            @endphp
	                                        <tr>
	                                        	<td> {{$i++}}</td>
                                                <td> <img src="{{$photo}}" class="img-fluid" style="border-radius: 10px; width: 140px; height: 150px;"></td>
	                                            <td>{{ $menu->codeno }}</td>
                                                <td>{{ $menu->name }}</td>
                                                <td>{{ $menu->price}}</td>
                                                <td>{{ $menu->description}}</td>
	                                            <td class="text-center"> 
                                                    <a href="{{ route('menu.edit', $menu->id)}}">
                                                       <i class="far fa-edit px-3 py-2 bg-dark text-light"></i>
                                                    </a>
                                                    <form action="{{ route('menu.destroy', $menu->id)}}" method="POST" onsubmit="return confirm('Are your sure want to delete ?')" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit">
                                                           <i class="far fa-trash-alt px-3 py-2 bg-dark text-light"></i>
                                                        </button>
                                                    </form>
                                                </td>
	                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-backend>