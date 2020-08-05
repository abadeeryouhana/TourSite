@extends('master')
@include('ajaxCancel')
@section('container')

    <section id="subs" class="headerBooking subscribe">
        <div class="container">
            <div class="subscribe-title text-center">
                <h2>
                    Booking Cancel
                </h2>

            </div>

        </div>

    </section>
    <!--subscribe end-->
    @if(session('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
<section>





    <input type="text" class="form-control" id="exampleDropdownFormPassword1" name="code" placeholder="Code" style="width: 200px">

    <button type="button" class="btn btn-primary" id="cancelBtn">Cancel Confirm</button>



<div id="data">


</div>



</section>
@endsection