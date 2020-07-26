@extends('master')
@section('container')

		
		<!--travel-box start-->
		<section  class="travel-box">
        	<div class="container">

        	</div><!--/.container-->

        </section><!--/.travel-box-->
		<!--travel-box end-->

        

		
		<!---->
	
		<section id="subs" class="headerBooking subscribe">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						{{$tour->name}} ( DESCRIPTION )
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
