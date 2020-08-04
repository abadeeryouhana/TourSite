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
            <a href="{{ url('dashboard/programs') }}" class="btn btn-warning" style="padding-bottom: 3px;"> <i class="fa fa-angle-double-left"></i>&nbsp; BACK</a>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form role="form" id="addEditProgram" action="{{route('programs.store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="programId" value="{{ (!empty($result->id))?($result->id):('') }}">

            <div class="box-body col-md-12 ">

              <div class="row">
                
                <div class="form-group col-md-6">
                  @php $input = 'rule'; @endphp
                  <label for="exampleInputEmail1">RULE <span class="text-danger">*</span></label>                  
                  <input type="text" class="form-control{{ $errors->has('rule') ? ' is-invalid' : '' }}" id="rule" placeholder="ENTER RULE" value="{{ (!empty($result->rule))?($result->rule):('') }}" name="{{$input}}" required>
                  @if ($errors->has($input))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first($input) }}</strong>
                    </span>
                  @endif
                </div>

                
              </div>

              

              
            </div>
            
            <div class="box-body col-md-12 ">
              <div class="form-group row">
                  <div class=" col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
            </div>
        </div>
    </form>
</div>
      </div>
    </div>
  </div>
</section>
@endsection


@section('js')
<script type="text/javascript" src="{{asset('plugnis/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('js/custom-script.js') }}"></script>
@endsection