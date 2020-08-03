@extends('master')
@section('container')


	<!--about-us start -->
	<section id="home" class="about-us">
		<div class="container">
			<div class="about-us-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="single-about-us text-center" >
							<div class="about-us-txt col-md-12">
								<h2>
									اقضى وقتا ممتعا مع اقوى العروض السياحية لدينا

								</h2>
								<div class="about-btn">
									<button  class="about-view">
										explore now
									</button>
								</div><!--/.about-btn-->
							</div><!--/.about-us-txt-->
						</div><!--/.single-about-us-->
					</div><!--/.col-->
					<div class="col-sm-0">
						<div class="single-about-us">

						</div><!--/.single-about-us-->
					</div><!--/.col-->
				</div><!--/.row-->
			</div><!--/.about-us-content-->
		</div><!--/.container-->

	</section><!--/.about-us-->
	<!--about-us end -->

	<!--travel-box start-->
	<section  class="travel-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="single-travel-boxes">
						<div id="desc-tabs" class="desc-tabs">

							<!-- Tab panes -->
							<div class="tab-content">

								<div role="tabpanel" class="tab-pane active fade in" id="tours">
									<div class="tab-para">
										<form method="post" action="/search"> <!-- Start Form tag-->
											@csrf
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-12 ">
													<div class="single-tab-select-box">
														<h2>البحث بالمدينة</h2>
														<h2>المدينة</h2>

														<div class="travel-select-icon">

															<select class="form-control " name="city" placeholder="الي اين تريد الذهاب">

																<option value={{false}}>الي اين تريد الذهاب</option><!-- /.option-->

																@foreach($city as $c)

																	<option value="{{$c->city}}" >{{$c->city}}</option><!-- /.option-->

																@endforeach

															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->



													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												<div class="col-lg-2 col-md-3 col-sm-4  text-center">
													<div class="single-tab-select-box">
														<h2>البحث بالتاريخ</h2>
														<h2>من </h2>
														<div class="travel-check-icon">
															<input type="text" name="check_in" class="form-control" data-toggle="datepicker"  placeholder="12 -01 - 2017 ">
															<!--<form action="#">
                                                                <input type="text" name="check_in" class="form-control" data-toggle="datepicker" placeholder="12 -01 - 2017 ">
                                                            </form>-->
														</div><!-- /.travel-check-icon -->
													</div><!--/.single-tab-select-box-->
													<div class="single-tab-select-box">

														<h2>الى </h2>
														<div class="travel-check-icon">
															<input type="text" name="check_out" class="form-control" data-toggle="datepicker"  placeholder="12 -01 - 2017 ">
															<!--  <form action="#">
                                                                  <input type="text" name="check_in" class="form-control" data-toggle="datepicker" placeholder="12 -01 - 2017 ">
                                                              </form>-->
														</div><!-- /.travel-check-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												<div class="col-lg-2 col-md-1 col-sm-4  text-center">
													<div class="single-tab-select-box">
														<h2>البحث بالمدة</h2>
														<h2>من </h2>
														<div class="travel-select-icon">
															<select class="form-control " name="duration1">
																<option value={{false}} >اختار المدة</option>
																<option value="5" >5</option><!-- /.option-->

																<option value="10" >10</option><!-- /.option-->

																<option value="15" >15</option><!-- /.option-->
																<option value="20" >20</option><!-- /.option-->

															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->
													</div><!--/.single-tab-select-box-->
													<div class="single-tab-select-box">
														<h2>الي</h2>
														<div class="travel-select-icon">
															<select class="form-control " name="duration2">
																<option value={{false}} >اختار المدة</option>
																<option value="5" >5</option><!-- /.option-->

																<option value="10" >10</option><!-- /.option-->

																<option value="15" >15</option><!-- /.option-->
																<option value="20" >20</option><!-- /.option-->

															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												<div class="col-lg-2 col-md-1 col-sm-4 text-center">

													<div class="single-tab-select-box">
														<h2>البحث بالسعر</h2>
														<h2>من</h2>
														<div class="travel-select-icon">
															<select class="form-control "  name="cost1">
																<option value={{false}} >اختر السعر</option>
																<option value="1000" >1000</option><!-- /.option-->

																<option value="3000" >3000</option><!-- /.option-->

																<option value="5000" >5000</option><!-- /.option-->
																<option value="7000" >7000</option><!-- /.option-->

															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->
													</div><!--/.single-tab-select-box-->

													<div class="single-tab-select-box">
														<h2>الى</h2>
														<div class="travel-select-icon">
															<select class="form-control " name="cost2">
																<option value={{false}} >اختر السعر</option>
																<option value="1000" >1000</option><!-- /.option-->

																<option value="3000" >3000</option><!-- /.option-->

																<option value="5000" >5000</option><!-- /.option-->
																<option value="7000">7000</option><!-- /.option-->

															</select><!-- /.select-->
														</div><!-- /.travel-select-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->
												<div class="col-sm-3 " style="margin-top:40px">

													<div class="single-tab-select-box">
														<div class="about-btn pull-right">
															<button  class="about-view travel-btn" type="submit">
																search
															</button><!--/.travel-btn-->
														</div><!--/.about-btn-->
													</div><!--/.col-->
												</div>
											</div><!--/.row-->



										</form>

									</div><!--/.tab-para-->

								</div><!--/.tabpannel-->

							</div>

						</div><!--/.tabpannel-->

					</div><!--/.tab content-->
				</div><!--/.desc-tabs-->
			</div><!--/.single-travel-box-->
		</div><!--/.col-->
		</div><!--/.row-->
		</div><!--/.container-->

	</section>
	<!--/.travel-box-->
        

		
		<!---->
	
		<section id="subs" class="headerBooking subscribe">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						{{$tour->name}}
					</h2>
					
				</div>
				
			</div>

		</section>
		<!--subscribe end-->
		<section id="" class= "personalDataForm">
			
			<div class="container">
			
				<div class="text-center ">
					<img src = "{{URL::asset('tourImages/' .$tour->images[0]->path)}}" style="height: 320px;width: 770px" />
				</div>
				<div class="col-md-8 col-md-offset-2 " id = "titleHeader" >
					<div>
						<label class="regLabel h4"> Tour Name</label>
						<div class="alert-info tourDetailsLabels">
							<label>{{$tour->name}}</label>
						</div>
					</div>
					<div>
						<label class="regLabel h4"> Destination</label>
						<i class="fa fa-location-arrow" aria-hidden="true"></i>
						<div class="alert-info tourDetailsLabels">
							<label>{{$tour->city}} - {{$tour->country}}</label>
						</div>
					</div>
					<div>
						<label class="regLabel h4"> Start Date</label>
						<div class="alert-info tourDetailsLabels">
							<label>{{$tour->startDate}}</label>
						</div>
					</div>
					<div>
						<label class="regLabel h4"> Duration </label>
						<div class="alert-info tourDetailsLabels">
							<label>{{$tour->duration}} Days</label>
						</div>
					</div>
					<div>
						<label class="regLabel h4"> Cost For Single </label>
						<div class="alert-info tourDetailsLabels">
							<label>{{$tour->cost}}$</label>
						</div>
					</div>
					
					<div>
						<label class="regLabel h4"> Program </label>
						<div class="alert-info tourDetailsLabels">
							<ul class="list-group ">
								@foreach($tour->programs as $pro)
								<li class="list-group-item list-group-item-light"> {{$pro->rule}}</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div>
						<label class="regLabel h4"> Notes </label>
						<div class="alert-info " style="background-color: aliceblue; padding: 15px;">
							<label>{{$tour->notes}}</label>
						</div>
					</div>
					<div class = "col-md-6">
						<button href="#" class="btn btn-primary">BOOK NOW</button>
					</div>
					

				</div>
			</div>
		</section>
		<div class = "linSep">

		</div>
@endsection
