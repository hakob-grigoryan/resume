@extends('layout.header')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ADMIN DASHBOARD</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-recycle fa-5x"> </i>
                        <h3>{{$postStatistics}} Posts</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-recycle fa-5x"> </i>
                        <h3>{{$notificationStatistics}} Notification</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-recycle fa-5x"> </i>
                        <h3>{{$newsStatistics}} News</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa fa-recycle fa-5x"> </i>
                        <h3>{{$tablesStatistics}} Tables</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{asset('assets/img/1.jpg')}}" alt="" />
                            </div>
                            <div class="item">
                                <img src="{{asset('assets/img/2.jpg')}}" alt="" />
                            </div>
                            <div class="item">
                                <img src="{{asset('assets/img/3.jpg')}}" alt="" />
                            </div>
                        </div>
                        <!--INDICATORS-->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example" data-slide-to="1"></li>
                            <li data-target="#carousel-example" data-slide-to="2"></li>
                        </ol>
                        <!--PREVIUS-NEXT BUTTONS-->
                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"> </span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"> </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Recent Chat History
                        </div>
                        <div class="panel-body chat-widget-main">
                            @foreach($notif as $value)
                            <form class="myForm" action="{{ route('updateStatus')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $value->id }}" />
                                <div class="{{ $value->status ? 'chat-widget-right' : 'chat-widget-left' }}" onclick="this.parentElement.submit();">
                                    {{$value->message}}
                                </div>
                            </form>
                            <div class="chat-widget-name-left">
                                <h4>{{$value->name}}</h4>
                                <h4>{{$value->phone}}</h4>
                                <h5>{{$value->email}}</h5>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
