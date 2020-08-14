@extends('dashboard.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('plugnis/fancybox/source/jquery.fancybox.css') }}">
@endsection

@section('content')
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
        <div class="box box-primary box-solid">
          <div class="box-header box-header-background with-border">
            <h3 class="box-title">{{ $title }}</h3>
            <div class="box-tools pull-right">
              <a href="{{ url('dashboard/tours') }}" class="btn btn-warning" style="padding-bottom: 3px;"> <i class="fa fa-angle-double-left"></i>&nbsp; BACK</a>
            </div>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <div class="box-body">
              <form role="form" id="addEditUser" action="{{route('tours.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="tourId" value="{{ (!empty($result->id))?($result->id):('') }}">

                <div class="box-body col-md-12 ">

                  <div class="row">
                    
                    <div class="form-group col-md-6">
                      @php $input = 'name'; @endphp
                      <label for="exampleInputEmail1">NAME <span class="text-danger">*</span></label>                  
                      <input type="text" value="{{ (!empty($result->name))?($result->name):('') }}" name="{{$input}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER NAME" required>
                      @if ($errors->has($input))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first($input) }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group col-md-6 ">
                        @php $input = 'country'; @endphp
                        <label for="exampleInputEmail1">COUNTRY <span class="text-danger">*</span></label>
                        
                        <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" id="country" placeholder="ENTER COUNTRY" value="{{ (!empty($result->country))?($result->country):('') }}" name="{{$input}}" required>
                        @if ($errors->has($input))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first($input) }}</strong>
                            </span>
                        @endif
                      </div>
                  </div>

                  

                  <div id="show-div">
                    <div class="row">
                        <div class="form-group col-md-6 ">
                            @php $input = 'city'; @endphp
                            <label for="exampleInputEmail1">CITY <span class="text-danger">*</span></label>
                            <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER CITY" value="{{ (!empty($result->city))?($result->city):('') }}" name="{{$input}}" required>
                            @if ($errors->has($input))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                            @endif
                        </div>
                      
                      <div class="form-group col-md-6 ">
                        @php $input = 'startDate'; @endphp
                          <label for="exampleInputEmail1">START DATE <span class="text-danger">*</span></label>
                          
                          @if (!empty($result->id)) 
                            <input class='form-control' value="{{ (!empty($result->startDate))?($result->startDate):('') }}" readonly />
                            <input required type="datetime-local" class="form-control"  value="{{ (!empty($result->startDate))?($result->startDate):('') }}" name="{{$input}}" size="16" name="meeting-time">   

                          @else
                            <input type="datetime-local" class="form-control" name="{{$input}}" size="16" name="meeting-time" required>   
                          @endif  
                        
                        
                      </div>
                      

                

                      
                      
                    </div>
                  </div>

                  <div id="show-div">
                    <div class="row">
                        <div class="form-group col-md-6 ">
                            @php $input = 'duration'; @endphp
                            <label for="exampleInputEmail1">DURATION <span class="text-danger">*</span></label>
                            <input type="text" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER DURATION" value="{{ (!empty($result->duration))?($result->duration):('') }}" name="{{$input}}" required>
                            @if ($errors->has($input))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                            @endif
                        </div>
                      
                        <div class="form-group col-md-6 ">
                          @php $input = 'cost'; @endphp
                          <label for="exampleInputEmail1">COST <span class="text-danger">*</span></label>
                          <input type="text" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER COST" value="{{ (!empty($result->cost))?($result->cost):('') }}" name="{{$input}}" required>
                            @if ($errors->has($input))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first($input) }}</strong>
                                </span>
                            @endif
                        </div>

                      
                      
                    </div>
                  </div> 

                  <div id="show-div">
                    <div class="row">
                    
                      <div class="form-group col-md-6">
                        @php $input = 'transportationType'; @endphp
                        <label for="exampleInputEmail1">TRANSPORTATION TYPE <span class="text-danger">*</span></label>                  
                        <input type="text" class="form-control{{ $errors->has('transportationType') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER TRANSPORTATION TYPE" value="{{ (!empty($result->transportationType))?($result->transportationType):('') }}" name="{{$input}}" required>
                        @if ($errors->has($input))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first($input) }}</strong>
                          </span>
                        @endif
                      </div>
      
                      <div class="form-group col-md-6 ">
                          @php $input = 'notes'; @endphp
                          <label for="exampleInputEmail1">NOTES <span class="text-danger">*</span></label>
                          
                          <input type="text" class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }}" id="notes" placeholder="ENTER NOTES" value="{{ (!empty($result->notes))?($result->notes):('') }}" name="{{$input}}" required>
                          @if ($errors->has($input))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first($input) }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                  </div>

                  <div id="show-div">
                    <div class="row">
                    
                      <div class="form-group col-md-6">
                        @php $input = 'totalNumber'; @endphp
                        <label for="exampleInputEmail1">TOTAL NUMBER<span class="text-danger">*</span></label>                  
                        <input type="text" class="form-control{{ $errors->has('totalNumber') ? ' is-invalid' : '' }}" id="name" placeholder="ENTER TOTAL NUMBER" value="{{ (!empty($result->totalNumber))?($result->totalNumber):('') }}" name="{{$input}}" required>
                        @if ($errors->has($input))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first($input) }}</strong>
                          </span>
                        @endif
                      </div>
    
                    </div>
                  </div>

                  <div id="show-div">
                    <div class="form-group col-md-6">
                      <div class="row">
                        @php $input = 'rule[]'; @endphp
                    
                        <div class="input-group control-group increment">
                            
                                <label style="margin: 10px">PROGRAM</label>
                                @if (!empty($result->id)) 
                                <input type="text" class="form-control" name="{{$input}}" >
                                @else
                                <input type="text" class="form-control" name="{{$input}}"required>
                                @endif
                                <div class="input-group-btn" style="padding-top: 40px; padding-left: 10px"> 
                                    <button class="btn btn-primary" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            
                            
                        </div>
                        
                    
                        <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                            <input type="text" name="{{$input}}" class="form-control">
                              <div class="input-group-btn" style="padding-left: 10px"> 
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                              </div>
                            </div>
                        </div>
                    
                      </div>
                    </div>
                    <script type="text/javascript">

                      $(document).ready(function() {
                    
                        $(".btn-warning").click(function(){ 
                            var html = $(".clone1").html();
                            $(".increment1").after(html);
                        });
                    
                        $("body").on("click",".btn-danger",function(){ 
                            $(this).parents(".control-group").remove();
                        });
                    
                      });
                    
                    </script>
                  </div>
                

                  <div id="show-div">
                    <div class="form-group col-md-6" style="padding-left: 30px">
                      <div class="row">
                        @php $input = 'path[]'; @endphp
                    
                        <div class="input-group control-group increment1">
                            
                                <label style="margin: 10px">TOUR IMAGE</label>
                                @if (!empty($result->id)) 
                                <input type="file" class="form-control" name="{{$input}}">
                                @else
                                <input type="file" class="form-control" name="{{$input}}" required>
                                @endif
                                <div class="input-group-btn" style="padding-top: 40px; padding-left: 10px"> 
                                    <button class="btn btn-warning" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            
                            
                        </div>
                        
                    
                        <div class="clone1 hide">
                            <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="{{$input}}" class="form-control">
                              <div class="input-group-btn" style="padding-left: 10px"> 
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                              </div>
                            </div>
                        </div>

                      </div>
                    </div>
                    <script type="text/javascript">

                      $(document).ready(function() {
                    
                        $(".btn-primary").click(function(){ 
                            var html = $(".clone").html();
                            $(".increment").after(html);
                        });
                    
                        $("body").on("click",".btn-danger",function(){ 
                            $(this).parents(".control-group").remove();
                        });
                    
                      });
                    
                    </script>
                </div>
              </form>
                  
                
                @if (!empty($result->id)) 
                  @php $images = DB::table('galleries')->where('t_id',$result->id)->get(); @endphp
                  @php $programs = DB::table('programs')->where('t_id',$result->id)->get(); @endphp
                  <div id="show-div">
                    <div class="row">

                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">PROGRAM RULE <span class="text-danger">*</span></label>                  
                        @foreach ($programs as $value) 
                          <input type="text" value="{{$value->rule}}" name="rule" class="form-control" id="name" >

                          {{-- <p>{{ $value->rule }}</p> --}}
                          
                          {{-- <div class="form-group row"> --}}
                            @php $id = $value->id; @endphp

                            <a href="{{ url('dashboard/program/'.$id) }}" data-toggle="tooltip" data-original-title="Edit" title="EDIT" class="btn btn-warning btn-xs">
                              <i class="fa fa-pencil text-inverse m-r-10"> EDIT</i> 
                            </a>
                        
                        {{-- </div> --}}
                            
                          </form>
                          <hr>
                        @endforeach
                      </div>

                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">TOUR IMAGES <span class="text-danger">*</span></label><br>                  
                        
                        @foreach ($images as $value)
                          <img style="padding:3px" width="330" height="200" src="{{ url('tourImages/'.$value->path) }}" >
                          {{-- <a href="{{url('dashboard/image/delete',['id' => $value->id])}}" data-toggle="tooltip" data-original-title="Edit" title="EDIT" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil text-inverse m-r-10"> DELETE</i> 
                          </a> --}}
                          <form action="{{url('dashboard/image/delete',['id' => $value->id])}}" method="POST">
                            @csrf
                            {{ method_field('delete')}}
                            <button type="submit" rel="tooltip" title="DELETED" class="btn btn-danger btn-xs" data-original-title="Delete">
                                <i class="fa fa-trash-o"> DELETED</i>
                            </button>
                            
                          </form>
                      
                        @endforeach
                      </div>
                
                      
                    </div>
                  </div> 
                @endif 
                <br>
                {{-- <button type="submit" class="btn btn-primary">
                  <i class="fa fa-pencil text-inverse m-r-10"> Submit</i> 
                </button> --}}
                <div id="show-div"> 
                  <div class="form-group row"> 
                    <div class=" col-md-6">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
                
            </div>
            
        </div>
    </div>
  </div>
</section>
@endsection


@section('js')
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript" src="{{asset('plugnis/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('js/custom-script.js') }}"></script>



@endsection