<section id="" class= "personalDataForm">

    <div class="container">
        <div class="text-center" id = "titleHeader">
            <h2 class="regLabel">
                بيانات حجز {{$tour->name}}
            </h2>

        </div>
        <form class="col-md-8 col-md-offset-2" method="post" action="/cancel">
            @csrf
            <div class="form-group">
                <div class="form-group col-md-6 regLabel">
                    <label for="labelNameTitle">Name</label>
                    <input type="text" name="name" value="  {{$customer->name}}" class="form-control" readonly>


                </div>
                <div class="form-group col-md-6 regLabel">
                    <label for="inputPassword4">phone</label>
                    <input type="text" name="phone" value="  {{$customer->phone}}" class="form-control" readonly>

                </div>
            </div>
            <div class="form-group col-md-12 regLabel">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" value="  {{$customer->street}} - {{$customer->city}} - {{$customer->country}}" class="form-control" readonly>

            </div>
            <div class="form-group col-md-12 regLabel">
                <label for="inputAddress2">Email</label>
                <input type="text" name="email" value="  {{$customer->email}}" class="form-control" readonly>

            </div>
            <div class="form-group regLabel">
                <div class="form-group col-md-6">
                    <label for="inputCity">Number of Persons</label>
                    <input type="text" name="numberOfPassengers" value=" {{$book->numberOfPassengers}}" class="form-control" readonly>

                </div>


            </div>
            <div class="form-group col-md-12 regLabel">
                <label for="inputAddress2">Destination</label>
                <input type="text" name="country" value="  {{$tour->city}} - {{$tour->country}}" class="form-control" readonly>

            </div>
            <div class="form-group regLabel">
                <div class="form-group col-md-6">
                    <label for="inputCity">Travel time</label>
                    <input type="text" name="startDate" value="  {{$tour->startDate}} " class="form-control" readonly>

                </div>
                <div class="form-group col-md-6 regLabel">
                    <label for="inputState">Duration</label>
                    <input type="text" name="duration" value="  {{$tour->duration}} " class="form-control" readonly>

                </div>

            </div>
            <div class="form-group col-md-12 regLabel">
                <label for="inputAddress2">Cost For One Person</label>
                <input type="text" name="cost1" value="  {{$tour->cost}} LE" class="form-control" readonly>

            </div>
            <div class="form-group col-md-12 regLabel">
                <label for="inputAddress2">Total Cost</label>
                <input type="text" name="cost2" value=" {{$book->totalCost}} LE" class="form-control" readonly>

            </div>
            <div class="form-group col-md-12 regLabel">
                <label for="inputAddress2">Booking Code</label>

           <input type="text" name="code" value=" {{$book->code}}" class="form-control" readonly>


            </div>
            <div class = "form-group col-md-6">
                <button type="submit" class="btn btn-primary">CONFIRM CANCEL</button>
            </div>
        </form>
    </div>
</section>