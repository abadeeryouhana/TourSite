
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
						REGISTRING IN TOUR {{$tour->name}} 
					</h2>
					
				</div>
				
				<div class="col-md-8  left" >
					<div class="panel panel-default" style="background-color: #F7F7F7;">
  <div class="panel-body">
  	@foreach ($errors->all() as $error)
         <div class="alert alert-danger" role="alert">{{ $error }}</div>
     @endforeach
				<form  method="POST" action="{{route('book.save',$tour->id)}}">
					@csrf
					<div class="form-group">
						<div class="form-group col-md-6 regLabel">
							<label for="labelNameTitle">Name</label>
							<input type="text" name="name" required  class="form-control">
							
							
						</div>
						<div class="form-group col-md-6 regLabel">
							<label for="inputPassword4">phone</label>
							<input type="tel" name="phone" required  class="form-control">
							
					    </div>
					</div>
					<div class="form-group  regLabel">

						<div class="form-group col-md-6">
							<label for="country">Country</label>
						    <input type="text" name="country" required class="form-control">
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						</div>
						<div class="form-group col-md-6">
							<label for="city">City</label>
							<input type="text" name="city" required class="form-control" >
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						</div>
					</div>
					<div class="form-group col-md-12 regLabel">
						<label for="street">Street</label>
						<input type="text" name="street" required  class="form-control">
						<!-- <div class="alert alert-info" role="alert">
							15 saad st assiut - egypt
						</div> -->
				    </div>
					
					<div class="form-group  regLabel">

						<div class="form-group col-md-6">
							<label for="email">Email</label>
						    <input type="email" name="email" required class="form-control">
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						</div>
						<div class="form-group col-md-6">
							<label for="inputCity">Number of Persons</label>
							<input type="Number" name="NoOfPerson" required class="form-control" min="1" max="{{$tour->totalNumber - $tour->numberofRegisters}}" onchange="NoOfPersonFunction(this)" id="NoOfPerson">
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						</div>
					</div>
					
				<input type="hidden" name="cost" value="{{$tour->cost}}">
					<div class = "form-group col-md-6">
						<button type="submit" class="btn btn-primary">CONFIRM BOOKING</button>
					</div>
				</form>
			</div></div>

					<div class="panel panel-default" style="background-color: #F7F7F7;">
  <div class="panel-body">
  <b style="color: #FF6F61;"> Important information about your booking</b><br><br>
<p style="font-size: 13px;">Cancellations or changes made before two day of start date on {Aug 4, 2020} or no-shows are subject to a property fee equal to the first day  and fees.
</p>
  </div>
</div></div>
				
						



								<div class="col-md-4 right">
									<div class="row">
																			

  
    <div class="thumbnail">
      <img src="{{asset($tour->galleries[0]->path)}}" alt="..." style="height: 220px;">
      <div class="caption">
      	<b>Tour info</b>
      	<p>country:{{$tour->name}}</p>
        <p>country:{{$tour->country}}</p>
        <p>city:{{$tour->city}}</p>
        <p>start-in:{{$tour->startDate}}</p>
        <p>duration:{{$tour->duration}}</p>
        <p>transportation Type:{{$tour->transportationType}}</p>
        
        
      </div>
    </div>

    <div class="panel panel-default">
  <div class="panel-heading"><b style="color: ">Price details</b></div>
  <div class="panel-body">
   <p> Price for one person &nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; &nbsp;			      EGP {{$tour->cost}}</p>
   <p> Price for all person  &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	         <span id="noOfP"></span> persons * {{$tour->cost}}</p>
    <hr>
   <p> Total price   &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;&nbsp;	&nbsp;	&nbsp;	&nbsp;			               EGP <span id="allCost"></span></p>

  </div>
</div>
  </div>

								</div>

			</div>
		</section>
		<div class = "linSep"></div>

		<script type="text/javascript">
  function NoOfPersonFunction(input1) {
    var input1 = document.getElementById('NoOfPerson');
    $("#noOfP").html(input1.value); 
    var allcost=input1.value*"{{$tour->cost}}";
   $("#allCost").html(allcost); 
    
  }
</script>

	@endsection