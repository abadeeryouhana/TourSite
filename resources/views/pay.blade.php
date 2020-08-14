@extends('master')
@section('container')
    <!-- Set up a container element for the button -->
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
            PAY PAGE 
          </h2>
          
        </div>
        
      </div>

    </section>

            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row" style="margin: 5px;" >
                  <br>
                  @if (session('failed'))
                            <div class="alert alert-danger">
                             {{ session('failed') }}
                              </div>
                        @endif
                   

                    <h3> <span style='content: "\26A0"; font-size: 25px; color: orange'>⚠</span>please make sure the page Fully loaded  with two buttons</h3>
   <div style="color:#F39588;font-size: 13px; border:1px solid yellow; width: 90%;
   padding: 5px;">
   <br>
       * If you want to pay without paypal account click on debit or credit button.<br>
       * If error, refresh your page and wait to complete load or not show buttons.<br>
       * If restart page with no action this mean that error in data or network.<br>
      * If when click on debit or credit button and appeare a new paypal page opened this mean that your connection on internet is poor and this page pay too with debit or credit button but should make paypal account for security.<br></div>
<br><br>
      <h3 style="color: #919191"> Supported Cards</h3>
       <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppcmcvdam.png" alt="Pay with PayPal Credit or any major credit card" /> 
   </div><hr><hr>
    <div id="paypal-button-container" style="position: relative; z-index: 1;"></div>
     
</div></div></div>
    <!-- Include the PayPal JavaScript SDK -->


<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 -->
    <script src="https://www.paypal.com/sdk/js?client-id={{$client_id}}&currency=USD"  async data-sdk-integration-source="button-factory" data-order-id="{{uniqid()}}" ></script>


    <script>
        // Render the PayPal button into #paypal-button-container
        $(document).ready(function() {



window.onload = function () {
    if (! localStorage.justOnce) {
        localStorage.setItem("justOnce", "true");
        window.location.reload();
    }
}
          
         
           paypal.Buttons({

             style: {
                color:  'white',
                shape:  'pill',
                label:  'pay',
                height: 45
             },

              // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({

                   intent: 'CAPTURE',
                   application_context:
                {
                    return_url:"{{url('/paypal/checkout-success')}}"+"/"+"{{session('name')}}",
                    cancel_url : "{{route('paypal.cancel')}}"
                },
                
                invoice_id:"{{now()}}",
                invoice_description:'order description',
                     payer: {
        name:{
          given_Name:"{{session('')}}",
          surname:"{{session('')}}"
        },
        
        address: {
          address_line_1: "{{session('street')}}",
          address_line_2: "{{session('street')}}",
          admin_area_2: "{{session('city')}}",
          admin_area_1: "{{session('city')}}",
          postal_code: "{{session('zipCode')}}",
          country_code: "{{session('country')}}"
        },
        email_address: "{{session('email')}}",
        phone: {
          phone_type: "MOBILE",
          phone_number: {
            national_number: "{{session('phone')}}"
          }
        }
      },

                    purchase_units: [{
                      reference_id:"{{uniqid()}}",
                    
                        amount: {
                            value: "{{session('cost')}}",
                            currency_code: "USD",

                        },
          
          shipping: {
            address: {
              address_line_1: "{{session('street')}}",
              address_line_2: "{{session('street')}}",
              admin_area_2: "{{session('city')}}",
              admin_area_1: "{{session('city')}}",
              postal_code: "{{session('zipCode')}}",
              country_code: "{{session('country')}}"
            }
          },
                         
                  }]
                   
                });
            },

            // Finalize the transaction
         
              onApprove: function(data,actions) {
               <?php session(['secretz1z1' => 'ascriptmedia']);?>
              var DOEC_URL = "{{url('/paypal/checkout-success')}}"+"/"+"{{session('name')}}";
               window.location.assign(DOEC_URL);
              
                 
                
  

},
            onCancel: function(data) {

             alert('your payment canceld !  ');
            
             
              window.location.reload();
             },
            onError: function (err) {
             var DOEC_URL = "{{url('/paypal/checkout-error')}}"+"/"+err;
              window.location.assign(DOEC_URL);
         
             }


        }).render('#paypal-button-container');});















      
    </script>
 
@endsection    
