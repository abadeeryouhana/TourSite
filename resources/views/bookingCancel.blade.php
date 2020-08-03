@extends('master')
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
    @endif
<section>



        <form method="post" action="/cancel">
            @csrf

            <div class="form-group">
                <label for="exampleDropdownFormPassword1">Your Code</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="code" placeholder="Code" style="width: 200px">
            </div>

            <button type="submit" class="btn btn-primary">Cancel Confirm</button>
        </form>



</section>
@endsection