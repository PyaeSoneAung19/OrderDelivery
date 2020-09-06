<x-backend>
	<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                            	<a href="{{ route('todayorder') }}">
	                                <div class="overview-item overview-item--c1">
	                                    <div class="overview__inner">
	                                        <div class="overview-box clearfix">
	                                            <div class="icon">
                                                	<i class="zmdi zmdi-shopping-cart"></i>
                                            	</div>
	                                            <div class="text">
	                                                <h2>{{ $ordercount }}</h2>
	                                                <span> Today Order </span>
	                                            </div>
	                                        </div>
	                                        <div class="overview-chart">
	                                            <canvas id="widgetChart1"></canvas>
	                                        </div>
	                                    </div>
	                                </div>
                            	</a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            
                                            
	                                        <div class="icon">
                                                <i class="zmdi zmdi-info"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $rescount }}</h2>
                                                <span>Total Restaurant</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$menucount}}</h2>
                                                <span>Total Menu</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
	                                                <i class="zmdi zmdi-account-o"></i>
	                                        </div>
                                            <div class="text">
                                                <h2> {{ $usercount }}</h2>
                                                <span>Total Customer</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
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