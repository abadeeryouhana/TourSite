@extends('master')

@section('container')

    <section id="subs" class="headerBooking subscribe">
        <div class="container">
            <div class="subscribe-title text-center">
                <h2>
                    Ticket Print
                </h2>

            </div>

        </div>

    </section>
    <section>

    <div class="container">
        <div class="text-center" id = "titleHeader">
            <h2 class="regLabel">
                بيانات تذكرة {{$tour->name}}
            </h2>

        </div>
        
            <div class="form-group">
                <div class="form-group col-md-6 regLabel">
                    <label for="labelNameTitle">Name</label>
                    <input type="text" name="name" value="{{$customer->name}} " class="form-control" readonly>


                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Number of Persons</label>
                    <input type="text" name="numberOfPassengers" value="{{$book->numberOfPassengers}} " class="form-control" readonly>

                </div>
            </div>
        
           
          
       
            <div class="form-group regLabel">
                <div class="form-group col-md-6">
                    <label for="inputCity">Travel time</label>
                    <input type="text" name="startDate" value="  {{$tour->startDate}} " class="form-control" readonly>

                </div>
                <div class="form-group col-md-6 regLabel">
                    <label for="inputState">Duration</label>
                    <input type="text" name="duration" value=" {{$tour->duration}}  " class="form-control" readonly>

                </div>

            </div>
           
       
            <div class="form-group col-md-12 regLabel">
                <label for="inputAddress2">Booking Code</label>

           <input type="text" name="code" value=" {{$book->code}}" class="form-control" readonly>


            </div>
            <table>
            <tbody>
               <tr>
               <form method="post" action="/ticket/show/pdf/{{$book->code}}">
               @csrf
                 <td class="text-right">  <div class = "form-group col-md-6">
                 <button type="submit" class="btn btn-primary" >Show PDF</button>
                    </div>
                    </td>
                </form>

                   
                 <form method="post" action="/ticket/download/pdf/{{$book->code}}">
                 @csrf
                 <td class="text-right">  <div class = "form-group col-md-6">
                 <button type="submit" class="btn btn-primary" >Download PDF</button>
                    </div>
                    </td>
                 </form
                   
                    </td>
             </tr>
          

            </tbody>
            </table>
       
    </div>
</section>
    @endsection