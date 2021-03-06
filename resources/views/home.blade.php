@extends('layouts.app')

@section('content')

{{-- <?php dd($todays_earnings);?> --}}
{{-- <?php dd($todays_earnings['bto']);?> --}}

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>

        <form action="#" class="form search_form">
            <div class="form-group mb0">
                <input type="text" class="form-control search" name="search" placeholder="Search ticker or company name">
            </div>

            <div class="results hidetilloaded"></div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="top_gainers card">
                <div class="card-header">
                    <h4 class="mb0">Top Gainers</h4>
                </div>

                <div class="card-body p0">
                    <ul class="list-group">
                        @if(!empty($top_gainers))
                            @foreach($top_gainers as $tg)
                                <a class="list-group-item list-group-item-action" href="{{action('CompanyController@index', [$tg['symbol']])}}"><span class="company_name">{{$tg['companyName']}}</span> - <span class="ticker">{{$tg['symbol']}}</span> <span class="float-right">{{$tg['changePercent']}}%</span></a>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="top_losers card">
                <div class="card-header">
                    <h4 class="mb0">Top Losers</h4>
                </div>

                <div class="card-body p0">
                    <ul class="list-group">
                        @if(!empty($top_losers))
                            @foreach($top_losers as $tl)
                                <a class="list-group-item list-group-item-action" href="{{action('CompanyController@index', [$tl['symbol']])}}"><span class="company_name">{{$tl['companyName']}}</span> - <span class="ticker">{{$tl['symbol']}}</span> <span class="float-right">{{$tl['changePercent']}}%</span></a>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="todays_earnings card">
                <div class="card-header">
                    <h4 class="mb0">Today's Earnings</h4>
                </div>

                <div class="card-body p0">
                    <ul class="list-group">       

                        @php
                            if(!empty($todays_earnings)){
                                $bto_earnings = $todays_earnings['bto'];
                                $amc_earnings = $todays_earnings['amc'];
                            }
                        @endphp
                        
                        @if(!empty($todays_earnings))
                            @foreach($bto_earnings as $ern)
                                @if($loop->index < 7)
                                    <a class="list-group-item list-group-item-action" href="{{action('CompanyController@index', [$ern['symbol']])}}"><span class="company_name">{{$ern['quote']['companyName']}}</span> - <span class="ticker">{{$ern['symbol']}}</span>
                                    @if($ern['quote']['previousClose'] < $ern['quote']['latestPrice'])
                                        <span class="current_price_down price float-right">${{$ern['quote']['latestPrice']}}</span>
                                    @else
                                        <span class="current_price_up price float-right">${{$ern['quote']['latestPrice']}}</span>
                                    @endif
                                    </a> 
                                @endif
                            @endforeach

                            @foreach($amc_earnings as $ern)
                                @if($loop->index < 7)
                                    <a class="list-group-item list-group-item-action" href="{{action('CompanyController@index', [$ern['symbol']])}}"><span class="company_name">{{$ern['quote']['companyName']}}</span> - <span class="ticker">{{$ern['symbol']}}</span> <span class="price float-right">

                                    @if($ern['quote']['previousClose'] < $ern['quote']['latestPrice'])
                                        <span class="current_price_down price float-right">${{$ern['quote']['latestPrice']}}</span>
                                    @else
                                        <span class="current_price_up price float-right">${{$ern['quote']['latestPrice']}}</span>
                                    @endif
                                    </a> 
                                @endif
                            @endforeach 
                        @endif                       
                    </ul>
                    
                    <div class="d-flex justify-content-center">
                        <a href="" class="btn btn-info btn-md mt20 mb20">View All Earnings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
