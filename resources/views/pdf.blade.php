<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Ticket-pdf</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
        body{
            border-style: dotted;
            padding: 25px 25px 25px 25px;
             background-color: lightblue;
             font-family: DejaVu Sans, sans-serif;
             }
       
    </style>

</head>
<body class="login-page">

    <div>
        <div class="row">
            <div class="col-xs-7">
                
                <strong>TourNest Company</strong><br>
                123 Company Ave. <br>
                Toronto, Ontario - L2R 5A4<br>
                P: (416) 123-4567 <br>
                E: copmany@company.com <br>

                <br>
            </div>

          
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
             
                <h4>Traveller Info:</h4>
                <address>
                    <strong >{{$customer->name}}</strong><br>
                    <span>{{$customer->email}}</span> <br>
                    <span>{{$customer->phone}}</span>
                </address>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                    <tr>
                            <th><h4>Tour Info:</h4></th>
                            <td class="text-right"> {{$tour->name}}</td>
                        </tr>
                   
                        <tr>
                            <th>Number Of Passengers:</th>
                            <td class="text-right">{{$book->numberOfPassengers}}</td>
                        </tr>
                       
                        <tr>
                            <th> Tour Date: </th>
                            <td class="text-right">{{$tour->startDate}}</td>
                        </tr>
                        <tr>
                            <th> Tour Duration: </th>
                            <td class="text-right">{{$tour->duration}} Days</td>
                        </tr>
                        <tr>
                            <th> Booking Code: </th>
                            <td class="text-right">{{$book->code}}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

              
            </div>
        </div>

        


            

          
        </div>

    </body>
    </html>