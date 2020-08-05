<script src="{{asset('assets/js/jquery.js')}}"></script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $("#cancelBtn").click(function() {



            var code=$("#exampleDropdownFormPassword1").val();



                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '{{url("../cancelData")}}' ,
                    data:{code:code},
                    success:function(response){

                            $("#data").html(response);



                    },
                    error:function () {
                        alert("تأكد من الكود الصحيح");

                    }
                });



        });




    });
</script>