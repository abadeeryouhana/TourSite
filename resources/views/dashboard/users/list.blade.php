@extends('layouts.app')
@section('content')
<section class="content">
    <div class=" clearfix"></div>
    <div class="row">
        <div class="col-xs-12">
           <div class="box box-primary box-solid">
                <div class="box-header box-header-background with-border">
                    <h3 class="box-title">{{ __('message.ADMIN_LIST') }}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{url('admin/create')}}" class="btn btn-warning" style="padding-bottom: 3px;"> <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; {{ __('message.ADD_NEW') }}</a>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table id="admin_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('message.ID') }}</th>
                                <th>{{ __('message.S_NO') }}</th>
                                <th>{{ __('message.NAME') }}</th>
                                <th>{{ __('message.EMAIL') }}</th>
                                <th>{{ __('message.USER_TYPE') }}</th>
                                <th>{{ __('message.CREATED_AT') }}</th>
                                <th>{{ __('message.STATUS') }}</th>
                                <th class="">{{ __('message.ACTION') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('theme/fancy-box/jquery.fancybox.css') }}">

@endsection

@section('js')

<script type="text/javascript" src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('theme/fancy-box/jquery.fancybox.js') }}"></script>
<script type="text/javascript" src="{{ asset('theme/fancy-box/jquery.fancybox.pack.js') }}"></script>


<script type="text/javascript">

