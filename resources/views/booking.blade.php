
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
						Booking 
					</h2>
					
				</div>
				
			</div>

		</section>
		<!--subscribe end-->
		<section id="" class= "personalDataForm">
			
			<div class="container">
				<div class="text-center" id = "titleHeader">
					<h2 class="regLabel">
						REGISTRING IN TOUR 1 
					</h2>
					
				</div>
				<form class="col-md-8 col-md-offset-2">
					<div class="form-group">
						<div class="form-group col-md-6 regLabel">
							<label for="labelNameTitle">Name</label>
							<div class="alert alert-info" role="alert">
								Adm Ali Ali
							  </div>
							
						</div>
						<div class="form-group col-md-6 regLabel">
							<label for="inputPassword4">phone</label>
							<div class="alert alert-info" role="alert">
								0111111111
							</div>
					</div>
					</div>
					<div class="form-group col-md-12 regLabel">
						<label for="inputAddress">Address</label>
						<div class="alert alert-info" role="alert">
							15 saad st assiut - egypt
						</div>
				    </div>
					<div class="form-group col-md-12 regLabel">
						<label for="inputAddress2">Email</label>
						<div class="alert alert-info" role="alert">
							person@gmail.com
						</div>
					</div>
					<div class="form-group regLabel">
						<div class="form-group col-md-6">
							<label for="inputCity">Number of Persons</label>
							<div class="alert alert-info" role="alert">
								4
							</div>
						</div>
						<div class="form-group col-md-6 regLabel">
							<label for="inputState">Class</label>
							<div class="alert alert-info" role="alert">
								5 Stars
							</div>
						</div>
					
					</div>
					<div class="form-group col-md-12 regLabel">
						<label for="inputAddress2">Destination</label>
						<div class="alert alert-info" role="alert">
							sharm Elshikh - Egypt
						</div>
					</div>
					<div class="form-group regLabel">
						<div class="form-group col-md-6">
							<label for="inputCity">Travel time</label>
							<div class="alert alert-info" role="alert">
								Sunday, July 19, 2020
							</div>
						</div>
						<div class="form-group col-md-6 regLabel">
							<label for="inputState">Duration</label>
							<div class="alert alert-info" role="alert">
								8 Days
							</div>
						</div>
					
					</div>
					<div class="form-group col-md-12 regLabel">
						<label for="inputAddress2">Cost For One Person</label>
						<div class="alert alert-info" role="alert">
							1000 LE
						</div>
					</div>
					<div class="form-group col-md-12 regLabel">
						<label for="inputAddress2">Total Cost</label>
						<div class="alert alert-info" role="alert">
							4000 LE
						</div>
					</div>
					<div class = "form-group col-md-6">
						<button type="submit" class="btn btn-primary">CONFIRM BOOKING</button>
					</div>
				</form>
			</div>
		</section>
		<div class = "linSep"></div>
	@endsection