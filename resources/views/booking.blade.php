
@extends('master')
@section('container')
<script type="text/javascript">
	 $(document).ready(function() {

	 $(function(){
    $('#errorMsgs').hide();
    
       $('#chechout').submit(function(e){
                  

        e.preventDefault();
         

        var name=$('input[name ="name"]').val();
       
        var email=$('input[name ="email"]').val();
        var street=$('input[name ="street"]').val();
        var city=$('input[name ="city"]').val();
         var country=$('select[name ="country"]').val();
        
        var zipCode=$('input[name ="zipCode"]').val();
        var phone=$('input[name ="phone"]').val();
        var NoOfPerson=$('input[name ="NoOfPerson"]').val();
         var cost=$('input[name ="cost"]').val();
        var _token=$('input[name ="_token"]').val();
        var dataSend={name:name,email:email,street:street,city:city,country:country,zipCode:zipCode,phone:phone,NoOfPerson:NoOfPerson,cost:cost,_token:_token};
        	 	 $('#errorMsgs').show().empty();

         if((name==="")||(name.length >255) ){ 
        	 $('errorMsgs').show();
             $('#errorMsgs').addClass("alert alert-danger");
             $('#errorMsgs').show().append("your  Name must be string and not empty <br/>");
        	
        	$("#name").css("border-color", "red");
        	dataSend=null;

        }
         else{
        	$("#name").css("border-color", "#CAD3E8");
        }
       
        if((email==="")||(email.length >255) ){ 
        	 $('errorMsgs').show();
             $('#errorMsgs').addClass("alert alert-danger");
             $('#errorMsgs').show().append("your email must be email and not empty <br/>");
        	
        	$("#email").css("border-color", "red");
        	dataSend=null;

        }
         else{
        	$("#email").css("border-color", "#CAD3E8");
        }
        if((street==="")||(street.length >255) ){ 
        	 $('errorMsgs').show();
             $('#errorMsgs').addClass("alert alert-danger");
             $('#errorMsgs').show().append("your street must be string and not empty <br/>");
        	
        	$("#street").css("border-color", "red");
        	dataSend=null;

        }
         else{
        	$("#street").css("border-color", "#CAD3E8");
        }
        if((city==="")||(city.length >255) ){ 
        	 $('errorMsgs').show();
             $('#errorMsgs').addClass("alert alert-danger");
             $('#errorMsgs').show().append("your city must be string and not empty <br/>");
        	
        	$("#city").css("border-color", "red");
        	dataSend=null;

        }
         else{
        	$("#city").css("border-color", "#CAD3E8");
        }
        if((country==="")||(country.length >255) ){ 
        	 $('errorMsgs').show();
             $('#errorMsgs').addClass("alert alert-danger");
             $('#errorMsgs').show().append("your  not empty <br/>");
        	
        	$("#country").css("border-color", "red");
        	dataSend=null;
        }
         else{
        	$("#country").css("border-color", "#CAD3E8");
        }
        if((zipCode==="")||(zipCode.length >10)||isNaN(zipCode) ){ 
        	 $('errorMsgs').show();
             $('#errorMsgs').addClass("alert alert-danger");
             $('#errorMsgs').show().append("your zipCode must be number and not empty <br/>");
        	
        	$("#zipCode").css("border-color", "red");
        	dataSend=null;
            

        }
         else{
        	$("#zipCode").css("border-color", "#CAD3E8");
        }
        if((phone==="")||(phone.length>30 )||isNaN(phone) ){ 
        	 $('errorMsgs').show();
              $('#errorMsgs').addClass("alert alert-danger");
              $('#errorMsgs').show().append("your tel must be number <br/>");
        	$("#phone").css("border-color", "red");
        	dataSend=null;

        }
         else{
        	$("#phone").css("border-color", "#CAD3E8");
        }
        if((NoOfPerson==="")||isNaN(NoOfPerson) ){ 
        	 $('errorMsgs').show();
              $('#errorMsgs').addClass("alert alert-danger");
              $('#errorMsgs').show().append("your No Of Person must be number <br/>");
        	$("#NoOfPerson").css("border-color", "red");
        	dataSend=null;

        }
         else{
        	$("#NoOfPerson").css("border-color", "#CAD3E8");
        }
       
      if(dataSend!=null)  {
   $.ajax({

            
             method:"POST",
             url:"{{route('book.save',$tour->id)}}",
             dataType:'JSON',
             data:dataSend,
             
             
             success: function (data) {
             	//var location="../paypal/payment/"+data;
             	var location2="{{route('paypal.pay')}}";
             window.location.assign(location2);
	
             },
             error: function( data){
                if( data.status === 422 ) {
                   $('#errorMsgs').show();
            var errors = $.parseJSON(data.responseText);
            $.each(errors, function (key, value) {
                // console.log(key+ " " +value);
            $('#errorMsgs').addClass("alert alert-danger");

                if($.isPlainObject(value)) {
                    $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                    $('#errorMsgs').show().append(value+"<br/>");

                    });
                }else{
                $('#errorMsgs').show().append(value+"<br/>"); //this is my div with messages
                }
            });
          }
          
          
          }
            });
          }
          return false;
        });});});
  
</script>.


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
  @if (session('failed'))
                            <div class="alert alert-danger">
                             {{ session('failed') }}
                              </div>
                        @endif
                        <div id="errorMsgs"></div>
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger" role="alert">{{ $error }}</div>
     @endforeach
				<form  id="chechout">
					@csrf
					<div class="form-group">
						<div class="form-group col-md-6 regLabel">
							<label for="labelNameTitle">Name</label>
							<input type="text" name="name"   class="form-control" id="name">
							
							
						</div>
						<div class="form-group col-md-6 regLabel">
							<label for="inputPassword4">phone</label>
							<input type="tel" name="phone"   class="form-control" id="phone">
							
					    </div>
					</div>
					<div class="form-group  col-md-12 regLabel">

						
							<label for="Street">Street</label>
						    <input type="text" name="street"  class="form-control" id="street">
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						</div>
						<div class="form-group  regLabel">
						  <div class="form-group col-md-6">
							<label for="city">City</label>
							<input type="text" name="city"  class="form-control" id="city" >
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						  </div>
						  <div class="form-group col-md-6">
						  <label for="country">Country</label>
						  @include('country')
						    <!-- <div class="alert alert-info" role="alert">
							15 saad st assiut - egypt
						   </div> -->
				          </div>
					    </div>
					<div class="form-group col-md-12 regLabel">
					
				    
							<label for="zipCode">postal code</label>
						    <input type="text" name="zipCode"  class="form-control" id="zipCode">
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						
					</div>
					
					<div class="form-group  regLabel">

						<div class="form-group col-md-6">
							<label for="email">Email</label>
						    <input type="email" name="email"  class="form-control" id="email">
							<!-- <div class="alert alert-info" role="alert">
								4
							</div> -->
						</div>
						<div class="form-group col-md-6">
							<label for="inputCity">Number of Persons</label>
							<input type="Number" name="NoOfPerson"  class="form-control" min="1" max="{{$tour->totalNumber - $tour->numberofRegisters}}" onchange="NoOfPersonFunction(this)" id="NoOfPerson">
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