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

@endsection