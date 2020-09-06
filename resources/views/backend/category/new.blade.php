<x-backend>
	<div class="main-content">
		<div class="section__content section__content--p30">
		    <div class="container-fluid">
		    	<div class="row">
					<div class="col-md-12 mb-2">
						<div class="overview-wrap">
							<h2 class="title-1">Food Order </h2>
							<a class="au-btn au-btn-icon au-btn--blue" href="{{ route('category.index')}}">
								<i class="zmdi zmdi-plus"></i> Back </a>
						</div>
					</div>
				</div>
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="card">
		                    <div class="card-header">
		                        <h3> Category </h3>
		                    </div>
		                    <form action="{{ route('category.store')}}" method="POST" class="form-horizontal">
			                    @csrf
			                    <div class="card-body card-block">
			                            <div class="row form-group">
			                                <div class="col col-md-3">
			                                    Name
			                                </div>
			                                <div class="col-12 col-md-9">
			                                    <input type="text" name="name" class="form-control">
			                                    <div class="text-danger form-control-feedback">
                                         		 {{$errors->first('name')}}
                                      			</div>
			                                </div>
			                            </div>
			                    </div>
			                    <div class="card-footer">
			                        <button type="submit" class="btn btn-dark btn-sm px-4 pt-2">
			                            Save
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
</x-backend>