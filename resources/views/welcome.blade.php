<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Live Match Info</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
            }
            .custom-live-p-info {
                font-size: 12px;
                color: orangered;
                margin: 0 0 6px;
            }
            .custom-live-p-date {
                color: orangered;
                margin: 20px 0 6px;
            }
            .custom-upcoming-p-info {
                font-size: 12px;
                margin: 0 0 6px;
            }
            .custom-upcoming-p-margin {
                margin-top:15px;
            }


        </style>
    </head>
    <body>
    <div class="container-fluid">
        <h2>Live Match Info</h2>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Live & Upcoming</a></li>
        </ul>


        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <br>
                @if(!empty($allLiveMatchesItems))
                    @foreach($allLiveMatchesItems as $items)
                        <div class="row">
                            <div class="col-sm-3">
                                <p>
                                    <span style="background-color: orange" class="badge ">LIVE</span> {{$items->subtitle}}</p>
                                <p class="custom-live-p-info">{{$items->venue->name}},{{$items->venue->location}}</p>
                                <p class="custom-live-p-info">{{date('h:i A',$items->timestamp_start)}} Local Time</p>
                            </div>
                            <div class="col-sm-2">
                                <p class="text-center"><strong>{{strtoupper($items->teama->name)}}</strong></p>
                                @if(!empty($items->teama->scores_full))
                                <p class="text-center">
                                    {{$items->teama->scores_full}}
                                </p>
                                @endif
                            </div>
                            <div class="col-sm-3 text-center">
                                <div class="col-sm-4"><img src="{{$items->teama->logo_url}}"
                                                           class="img-responsive img-thumbnail">
                                </div>
                                <div class="col-sm-4 text-center"><h4>VS</h4></div>
                                <div class="col-sm-4"><img src="{{$items->teamb->logo_url}}"
                                                           class="img-responsive img-thumbnail">
                                </div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p><strong>{{strtoupper($items->teamb->name)}}</strong></p>
                                @if(!empty($items->teamb->scores_full))
                                    <p>
                                        {{$items->teamb->scores_full}}
                                    </p>
                                @endif
                            </div>
                            <div class="col-sm-2 text-center">
                                <p class="custom-live-p-date"><strong>{{date('j F, Y',$items->timestamp_start)}}</strong></p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endif
                @if(!empty($allUpcomingMatchesItems))
                    @foreach($allUpcomingMatchesItems as $items)
                        <div class="row">
                            <div class="col-sm-3">
                                <p>
                                    <span class="badge ">Upcoming</span> {{$items->subtitle}}</p>
                                <p class="custom-upcoming-p-info">{{$items->venue->name}},{{$items->venue->location}}</p>
                                <p class="custom-upcoming-p-info">{{date('h:i A',$items->timestamp_start)}} Local Time</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p class="custom-upcoming-p-margin"><strong>{{strtoupper($items->teama->name)}}</strong></p>
                            </div>
                            <div class="col-sm-3 text-center">
                                <div class="col-sm-4"><img src="{{$items->teama->logo_url}}"
                                                           class="img-responsive img-thumbnail">
                                </div>
                                <div class="col-sm-4 text-center"><h4>VS</h4></div>
                                <div class="col-sm-4"><img src="{{$items->teamb->logo_url}}"
                                                           class="img-responsive img-thumbnail">
                                </div>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p class="custom-upcoming-p-margin"><strong>{{strtoupper($items->teamb->name)}}</strong></p>

                            </div>
                            <div class="col-sm-2 text-center">
                                <p class="custom-upcoming-p-margin"><strong>{{date('j F, Y',$items->timestamp_start)}}</strong></p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    </body>
</html>
