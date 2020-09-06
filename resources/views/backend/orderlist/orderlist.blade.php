<x-backend>


<div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
	                <div class="row">
						<div class="col-md-12 mb-2">
							<div class="overview-wrap">
								<h2 class="title-1"> Order Lists </h2>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="overview-wrap">
                                <label> Start Date : </label><input type="date" class="form-control col-3" id="startdate">
                                <label> End Date : </label><input type="date" class="form-control col-3" id="enddate">
                                <button class="btn btn-dark" id="OrderCheck"> Display </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table" id="dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Orderdate</th>
                                            <th>Voucher No</th>
                                            <th>Customer Name</th>
                                            <th>Total</th>
                                            
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-light text-dark">
                                    	@php     $i=1;       @endphp
                                    	@foreach($orders as $order)
                                    		@php

                                    			$id=$order->id;

                                    		@endphp



	                                        <tr>
	                                        	<td>{{$i++}}</td>
                                                <td>{{$order->orderdate}}</td>
	                                            <td>{{$order->voucherno}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <td>{{$order->total}}</td>
                                                
	                                            <td class="text-center"> 
                                                    <a href="{{route('orderdetail',$id)}}">
                                                        <i class="fas fa-info px-3 py-2 bg-dark text-light"></i>
                                                        {{-- <i class="fas fa-info"></i> --}}
                                                    </a>

                                                </td>
	                                        </tr>
	                                      @endforeach
                                       
                                    </tbody>
                                </table>
                                <table class="table" id="OrderTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Orderdate</th>
                                            <th>Voucher No</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  class="bg-light text-dark" id="Data">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


















</x-backend>