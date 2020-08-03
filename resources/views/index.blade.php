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
		<section id="service" class="service">
			<div class="container">

				<div class="service-counter text-center">

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="service-img">
								<img src="assets/images/service/s1.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">
							<h2>
									<a href="#">
										رحلات ترفيهية 
									</a>
								</h2>
								<p>اجمل الرحلات الى شرم الشيخ و الغردقة </p>
								
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="service-img">
								<img src="assets/images/service/s2.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">
								<h2>
									<a href="#">
									رحلات اثارية
									</a>
								</h2>
								<p>تعرف على الحضارة الفرعونية.</p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="statistics-img">
								<img src="assets/images/service/s3.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">

								<h2>
									<a href="#">
										رحلات سياحة دينية
									</a>
								</h2>
								<p>رحلات الحج و العمرة </p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

				</div><!--/.statistics-counter-->	
			</div><!--/.container-->

		</section><!--/.service-->
		<!--service end-->

		<!--galley start-->
		<section id="gallery" class="gallery">
			<div class="container">
				<div class="gallery-details">
					<div class="gallary-header text-center">
						<h2>
							رحلات سابقة 
						</h2>
						<p>
							مختارة من اجمل صور الرحلات السابقة  
						</p>
					</div><!--/.gallery-header-->
					<div class="gallery-box">
						<div class="gallery-content">
						  	<div class="filtr-container">
						  		<div class="row">

						  			<div class="col-md-6">
						  				<div class="filtr-item">
											<img src="tourImages/7.jpeg" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													الغردقة
												</a>
												<p><span>20 tours</span><span>15 places</span></p>
											</div><!-- /.item-title -->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-6">
						  				<div class="filtr-item">
											<img src="tourImages/10.jpeg" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													الاقصر
												</a>
												<p><span>12 tours</span><span>9 places</span></p>
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-4">
						  				<div class="filtr-item">
											<img src="tourImages/Ain-sho7na.png" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													دهب
												</a>
												<p><span>25 tours</span><span>10 places</span></p>
											</div><!-- /.item-title -->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-4">
						  				<div class="filtr-item">
											<img src="tourImages/Ain-sho7na.png" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													دهب 
												</a>
												<p><span>18 tours</span><span>9 places</span></p>
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-4">
						  				<div class="filtr-item">
											<img src="tourImages/Ain-sho7na.png" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													دهب
												</a>
												<p><span>14 tours</span><span>12 places</span></p>
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-12">
						  				<div class="filtr-item">
											<img src="tourImages/9.jpg" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													القاهرة
												</a>
												<p><span>14 tours</span><span>6 places</span></p>
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  		</div><!-- /.row -->

						  	</div><!-- /.filtr-container-->
						</div><!-- /.gallery-content -->
					</div><!--/.galley-box-->
				</div><!--/.gallery-details-->
			</div><!--/.container-->

		</section><!--/.gallery-->
		<!--gallery end-->


		<!--discount-offer start-->
		<section class="discount-offer">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="dicount-offer-content text-center">
							<h2>Join with us within 21 January, 2018 and get upto 40% Discount</h2>
							<div class="campaign-timer">
								<div id="timer">
									<div class="time time-after" id="days">
										<span></span>
									</div><!--/.time-->
									<div class="time time-after" id="hours">

									</div><!--/.time-->
									<div class="time time-after" id="minutes">

									</div><!--/.time-->
									<div class="time" id="seconds">

									</div><!--/.time-->
								</div><!--/.timer-->
							</div><!--/.campaign-timer-->
							<div class="about-btn">
								<button  class="about-view discount-offer-btn">
									join now
								</button>
							</div><!--/.about-btn-->


						</div><!-- /.dicount-offer-content-->
					</div><!-- /.col-->
				</div><!-- /.row-->
			</div><!-- /.container-->

		</section><!-- /.discount-offer-->
		<!--discount-offer end-->

		<!--packages start-->
		<section id="pack" class="packages">
			<div class="container">
				<div class="gallary-header text-center">
					<h2>
						special packages
					</h2>
					<p>
						Duis aute irure dolor in  velit esse cillum dolore eu fugiat nulla.  
					</p>
				</div><!--/.gallery-header-->
				<div class="packages-content">
					<div class="row">
					@foreach($tours as $tour)
						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="tourImages/{{$tour->images[0]->path}}" alt="package-place" style="height: 190px" onclick="location.href='/tourDetails/{{$tour->id}}'">
								<div class="single-package-item-txt">
									<h3>{{$tour->country}} <span class="pull-right">${{$tour->cost}}</span></h3>
									<div class="packages-para">
										<p>
											<span>
												<i class="fa fa-angle-right"></i> {{$tour->duration}} days
											</span>
											<i class="fa fa-angle-right"></i>  5 star accomodation
										</p>
										<p>
											<span>
												<i class="fa fa-angle-right"></i>  {{$tour->transportationType}}
											</span>
											<i class="fa fa-angle-right"></i>  food facilities
										 </p>
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>2544 review</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn col-md-6">
										<button  class="about-view packages-btn" onclick="location.href='/tourDetails/{{$tour->id}}'">
											View Details
										</button>
										
									</div>		
									<div class="about-btn col-md-6">
										<button  class="about-view packages-btn">
											book now
										</button>	
										
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->
							<br><br>
						</div><!--/.col-->

						@endforeach

					</div><!--/.row-->

				</div><!--/.packages-content-->
			</div><!--/.container-->

		</section><!--/.packages-->
		<!--packages end-->
		<div class="row"></div>
		<!-- testemonial Start -->
		<section   class="testemonial">
			<div class="container">

				<div class="gallary-header text-center">
					<h2>
						clients reviews
					</h2>
					<p>
						Duis aute irure dolor in  velit esse cillum dolore eu fugiat nulla. 
					</p>

				</div><!--/.gallery-header-->

				<div class="owl-carousel owl-theme" id="testemonial-carousel">

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial1.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial2.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial1.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial1.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial2.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial1.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial1.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial2.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

					<div class="home1-testm item">
						<div class="home1-testm-single text-center">
							<div class="home1-testm-img">
								<img src="assets/images/client/testimonial1.jpg" alt="img"/>
							</div><!--/.home1-testm-img-->
							<div class="home1-testm-txt">
								<span class="icon section-icon">
									<i class="fa fa-quote-left" aria-hidden="true"></i>
								</span>
								<p>
									Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
								</p>
								<h3>
									<a href="#">
										kevin watson
									</a>
								</h3>
								<h4>london, england</h4>
							</div><!--/.home1-testm-txt-->	
						</div><!--/.home1-testm-single-->

					</div><!--/.item-->

				</div><!--/.testemonial-carousel-->
			</div><!--/.container-->

		</section><!--/.testimonial-->	
		<!-- testemonial End -->


		<!--special-offer start-->
		<section id="spo" class="special-offer">
			<div class="container">
				<div class="special-offer-content">
					<div class="row">
						<div class="col-sm-8">
							<div class="single-special-offer">
								<div class="single-special-offer-txt">
									<h2>الغردقة</h2>
									<div class="packages-review special-offer-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>25 review</span>
										</p>
									</div><!--/.packages-review-->
									<div class="packages-para special-offer-para">
										<p>
											<span>
												<i class="fa fa-angle-right"></i> ستة ايام و ستة ليالى
											</span>
											<span>
												<i class="fa fa-angle-right"></i> فردين
											</span>
											<span>
												<i class="fa fa-angle-right"></i>  اقامة 5 نجوم
											</span>
										</p>
										<p>
											<span>
												<i class="fa fa-angle-right"></i>  مواصلات
											</span>
											<span>
												<i class="fa fa-angle-right"></i>  وجبات
											</span>  
										</p>
										<p class="offer-para">
											العرض لفترة محدودة
										</p>
									</div><!--/.packages-para-->
									<div class="offer-btn-group">
										<div class="about-btn">
											<button  class="about-view packages-btn offfer-btn">
												قم بجولتك الاولى
											</button>
										</div><!--/.about-btn-->
										<div class="about-btn">
											<button  class="about-view packages-btn">
												book now
											</button>
										</div><!--/.about-btn-->
									</div><!--/.offer-btn-group-->
								</div><!--/.single-special-offer-txt-->
							</div><!--/.single-special-offer-->
						</div><!--/.col-->
						<div class="col-sm-4">
							<div class="single-special-offer">
								<div class="single-special-offer-bg">
									<img src="assets/images/offer/offer-shape.png" alt="offer-shape">
								</div><!--/.single-special-offer-bg-->
								<div class="single-special-shape-txt">
									<h3>عرض خاص</h3>
									<h4><span>40%</span><br>خصم</h4>
									<p><span>$999</span><br><del> $ 1450</del></p>
								</div><!--/.single-special-shape-txt-->
							</div><!--/.single-special-offer-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.special-offer-content-->
			</div><!--/.container-->

		</section><!--/.special-offer end-->
		<!--special-offer end-->

		<!--blog start-->
		<section id="blog" class="blog">
			<div class="container">
				<div class="blog-details">
						<div class="gallary-header text-center">
							<h2>
								latest news
							</h2>
							<p>
								Travel News from all over the world 
							</p>
						</div><!--/.gallery-header-->
						<div class="blog-content">
							<div class="row">

								<div class="col-sm-4 col-md-4">
									<div class="thumbnail">
										<h2>trending news <span>15 november 2017</span></h2>
										<div class="thumbnail-img">
											<img src="assets/images/blog/b1.jpg" alt="blog-img">
											<div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
										
										</div><!--/.thumbnail-img-->
									  
										<div class="caption">
											<div class="blog-txt">
												<h3>
													<a href="#">
														Discover on beautiful weather, Fantastic foods and historical place in Prag
													</a>
												</h3>
												<p>
													Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam 
												</p>
												<a href="#">Read More</a>
											</div><!--/.blog-txt-->
										</div><!--/.caption-->
									</div><!--/.thumbnail-->

								</div><!--/.col-->

								<div class="col-sm-4 col-md-4">
									<div class="thumbnail">
										<h2>trending news <span>15 november 2017</span></h2>
										<div class="thumbnail-img">
											<img src="assets/images/blog/b2.jpg" alt="blog-img">
											<div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
										
										</div><!--/.thumbnail-img-->
										<div class="caption">
											<div class="blog-txt">
												<h3>
													<a href="#">
														Discover on beautiful weather, Fantastic foods and historical place in india
													</a>
												</h3>
												<p>
													Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam 
												</p>
												<a href="#">Read More</a>
											</div><!--/.blog-txt-->
										</div><!--/.caption-->
									</div><!--/.thumbnail-->

								</div><!--/.col-->

								<div class="col-sm-4 col-md-4">
									<div class="thumbnail">
										<h2>trending news <span>15 november 2017</span></h2>
										<div class="thumbnail-img">
											<img src="assets/images/blog/b3.jpg" alt="blog-img">
											<div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
										
										</div><!--/.thumbnail-img-->
										<div class="caption">
											<div class="blog-txt">
												<h3><a href="#">10 Most Natural place to Discover</a></h3>
												<p>
													Lorem ipsum dolor sit amet, contur adip elit, sed do mod incid ut labore et dolore magna aliqua. Ut enim ad minim veniam 
												</p>
												<a href="#">Read More</a>
											</div><!--/.blog-txt-->
										</div><!--/.caption-->
									</div><!--/.thumbnail-->

								</div><!--/.col-->

							</div><!--/.row-->
						</div><!--/.blog-content-->
					</div><!--/.blog-details-->
				</div><!--/.container-->

		</section><!--/.blog-->
		<!--blog end-->

		
		<!--subscribe start-->
		<section id="subs" class="subscribe">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						Join our Subscribers List to Get Regular Update
					</h2>
					<p>
						Subscribe Now. We will send you Best offer for your Trip 
					</p>
				</div>
				<form>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
							<div class="custom-input-group">
								<input type="email" class="form-control" placeholder="Enter your Email Here">
								<button class="appsLand-btn subscribe-btn">Subscribe</button>
								<div class="clearfix"></div>
								<i class="fa fa-envelope"></i>
							</div>

						</div>
					</div>
				</form>
			</div>

		</section>
		<!--subscribe end-->

@endsection