@extends('layouts.app')
@section('title', 'Dashboard')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                        <div class="page-title-right">
                            @php
                                date_default_timezone_set('Asia/Karachi');
                                $now = date('l j F Y');
                            @endphp
                            <h3 style="text-transform:capitalize">{{ $now }}</h3>
                            <h4 class="digital-clock" id="digital-clock"></h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            @php
                                date_default_timezone_set('Asia/Karachi');
                                $currentHour = date('G');
                                $greeting;
                            @endphp
                            @if ($currentHour >= 5 && $currentHour < 12)
                                @php
                                    $greeting = 'Good Morning';
                                @endphp
                            @elseif ($currentHour >= 12 && $currentHour < 17)
                                @php
                                    $greeting = 'Good Afternoon';
                                @endphp
                            @elseif ($currentHour >= 17 && $currentHour < 19)
                                @php
                                    $greeting = 'Good Evening';
                                @endphp
                            @else
                                @php
                                    $greeting = 'Good Night';
                                @endphp
                            @endif
                            <h4 class="mb-sm-0">{{ $greeting }}, {{ $user->first_name }} {{ $user->last_name }}!</h4>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>POD Dashboard</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('/assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="{{ asset('/assets/images/users/avatar-7.jpg') }}" alt=""
                                            class="img-thumbnail rounded-circle">
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ $user->first_name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{ ucfirst($user->rolename->role_name) }}</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">
                                        <div class="mt-4">
                                            <a href="{{ route('dashboard.profile') }}"
                                                class="btn btn-primary waves-effect waves-light btn-sm">View
                                                Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4 card-title">Monthly Earning</h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-muted">This month</p>
                                    <h3>$34,252</h3>
                                    <p class="text-muted"><span class="text-success me-2">12% <i
                                                class="mdi mdi-arrow-up"></i></span> From previous
                                        period</p>
                                    <div class="mt-4"><a class="btn btn-primary waves-effect waves-light btn-sm"
                                            href="{{ url('javascript:void(0);') }}" target="_blank"
                                            rel="noopener noreferrer">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-4 mt-sm-0">
                                        <div id="radialbarchart" class="apex-charts" dir="ltr"
                                            style="min-height: 168.525px;">
                                            <div id="apexchartsan1h8ons"
                                                class="apexcharts-canvas apexchartsan1h8ons apexcharts-theme-light"
                                                style="width: 135px; height: 168.525px;"><svg id="SvgjsSvg1726"
                                                    width="135" height="168.52499999999998"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, -10)"
                                                    style="background: transparent;">
                                                    <foreignObject x="0" y="0" width="135" height="168.52499999999998">
                                                        <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml">
                                                        </div>
                                                    </foreignObject>
                                                    <g id="SvgjsG1728" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(-19.5, 0)">
                                                        <defs id="SvgjsDefs1727">
                                                            <clipPath id="gridRectMaskan1h8ons">
                                                                <rect id="SvgjsRect1729" width="182" height="204"
                                                                    x="-3" y="-3" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMaskan1h8ons"></clipPath>
                                                            <clipPath id="nonForecastMaskan1h8ons"></clipPath>
                                                            <clipPath id="gridRectMarkerMaskan1h8ons">
                                                                <rect id="SvgjsRect1730" width="180" height="202"
                                                                    x="-2" y="-2" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <linearGradient id="SvgjsLinearGradient1735" x1="1"
                                                                y1="0" x2="0" y2="1">
                                                                <stop id="SvgjsStop1736" stop-opacity="1"
                                                                    stop-color="rgba(242,242,242,1)" offset="0">
                                                                </stop>
                                                                <stop id="SvgjsStop1737" stop-opacity="1"
                                                                    stop-color="rgba(206,206,206,1)" offset="0.5">
                                                                </stop>
                                                                <stop id="SvgjsStop1738" stop-opacity="1"
                                                                    stop-color="rgba(206,206,206,1)" offset="0.65">
                                                                </stop>
                                                                <stop id="SvgjsStop1739" stop-opacity="1"
                                                                    stop-color="rgba(242,242,242,1)" offset="0.91">
                                                                </stop>
                                                            </linearGradient>
                                                            <linearGradient id="SvgjsLinearGradient1747" x1="1"
                                                                y1="0" x2="0" y2="1">
                                                                <stop id="SvgjsStop1748" stop-opacity="1"
                                                                    stop-color="rgba(85,110,230,1)" offset="0"></stop>
                                                                <stop id="SvgjsStop1749" stop-opacity="1"
                                                                    stop-color="rgba(72,94,196,1)" offset="0.5"></stop>
                                                                <stop id="SvgjsStop1750" stop-opacity="1"
                                                                    stop-color="rgba(72,94,196,1)" offset="0.65"></stop>
                                                                <stop id="SvgjsStop1751" stop-opacity="1"
                                                                    stop-color="rgba(85,110,230,1)" offset="0.91"></stop>
                                                            </linearGradient>
                                                        </defs>
                                                        <g id="SvgjsG1731" class="apexcharts-radialbar">
                                                            <g id="SvgjsG1732">
                                                                <g id="SvgjsG1733" class="apexcharts-tracks">
                                                                    <g id="SvgjsG1734"
                                                                        class="apexcharts-radialbar-track apexcharts-track"
                                                                        rel="1">
                                                                        <path id="apexcharts-radialbarTrack-0"
                                                                            d="M 50.94156838842453 125.05843161157546 A 52.40853658536585 52.40853658536585 0 1 1 125.05843161157546 125.05843161157546 "
                                                                            fill="none" fill-opacity="1"
                                                                            stroke="rgba(242,242,242,0.85)"
                                                                            stroke-opacity="1" stroke-linecap="butt"
                                                                            stroke-width="14.514512195121952"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-radialbar-area"
                                                                            data:pathOrig="M 50.94156838842453 125.05843161157546 A 52.40853658536585 52.40853658536585 0 1 1 125.05843161157546 125.05843161157546 ">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1741">
                                                                    <g id="SvgjsG1746"
                                                                        class="apexcharts-series apexcharts-radial-series"
                                                                        seriesName="SeriesxA" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath1752"
                                                                            d="M 50.94156838842453 125.05843161157546 A 52.40853658536585 52.40853658536585 0 1 1 125.69954624335796 51.59397137746902 "
                                                                            fill="none" fill-opacity="0.85"
                                                                            stroke="url(#SvgjsLinearGradient1747)"
                                                                            stroke-opacity="1" stroke-linecap="butt"
                                                                            stroke-width="14.963414634146343"
                                                                            stroke-dasharray="4"
                                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                            data:angle="181" data:value="67"
                                                                            index="0" j="0"
                                                                            data:pathOrig="M 50.94156838842453 125.05843161157546 A 52.40853658536585 52.40853658536585 0 1 1 125.69954624335796 51.59397137746902 ">
                                                                        </path>
                                                                    </g>
                                                                    <circle id="SvgjsCircle1742" r="40.151280487804875"
                                                                        cx="88" cy="88"
                                                                        class="apexcharts-radialbar-hollow"
                                                                        fill="transparent"></circle>
                                                                    <g id="SvgjsG1743" class="apexcharts-datalabels-group"
                                                                        transform="translate(0, 0) scale(1)"
                                                                        style="opacity: 1;"><text id="SvgjsText1744"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="88" y="148" text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-weight="600" fill="#556ee6"
                                                                            class="apexcharts-text apexcharts-datalabel-label"
                                                                            style="font-family: Helvetica, Arial, sans-serif;">Series
                                                                            A</text><text id="SvgjsText1745"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="88" y="126" text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="16px"
                                                                            font-weight="400" fill="#373d3f"
                                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                                            style="font-family: Helvetica, Arial, sans-serif;">67%</text>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <line id="SvgjsLine1753" x1="0" y1="0"
                                                            x2="176" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs"></line>
                                                        <line id="SvgjsLine1754" x1="0" y1="0"
                                                            x2="176" y2="0" stroke-dasharray="0"
                                                            stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                    </g>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mini-stats-wid card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Orders</p>
                                            <h4 class="mb-0">1,235</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary"><span
                                                    class="avatar-title"><i
                                                        class="bx bx-copy-alt font-size-24"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mini-stats-wid card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Revenue</p>
                                            <h4 class="mb-0">$35, 723</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary"><span
                                                    class="avatar-title"><i
                                                        class="bx bx-archive-in font-size-24"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mini-stats-wid card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium">Average Price</p>
                                            <h4 class="mb-0">$16.2</h4>
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary"><span
                                                    class="avatar-title"><i
                                                        class="bx bx-purchase-tag-alt font-size-24"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h5 class="mb-4 card-title">Email Sent</h5>
                                <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link" href="{{ url('#') }}">Week</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="{{ url('#') }}">Month</a>
                                        </li>
                                        <li class="nav-item"><a aria-current="page" class="nav-link active"
                                                href="{{ url('#') }}">Year</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="stackedColumnchart" class="apex-charts" dir="ltr" style="min-height: 375px;">
                                <div id="apexchartsid3dmqnc"
                                    class="apexcharts-canvas apexchartsid3dmqnc apexcharts-theme-light"
                                    style="width: 653px; height: 360px;"><svg id="SvgjsSvg1755" width="653"
                                        height="360" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <foreignObject x="0" y="0" width="653" height="360">
                                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                xmlns="http://www.w3.org/1999/xhtml"
                                                style="inset: auto 0px 1px; position: absolute; max-height: 180px;">
                                                <div class="apexcharts-legend-series" rel="1"
                                                    seriesname="SeriesxA" data:collapsed="false"
                                                    style="margin: 2px 5px;"><span class="apexcharts-legend-marker"
                                                        rel="1" data:collapsed="false"
                                                        style="background: rgb(85, 110, 230) !important; color: rgb(85, 110, 230); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                                        class="apexcharts-legend-text" rel="1" i="0"
                                                        data:default-text="Series%20A" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Series
                                                        A</span></div>
                                                <div class="apexcharts-legend-series" rel="2"
                                                    seriesname="SeriesxB" data:collapsed="false"
                                                    style="margin: 2px 5px;"><span class="apexcharts-legend-marker"
                                                        rel="2" data:collapsed="false"
                                                        style="background: rgb(241, 180, 76) !important; color: rgb(241, 180, 76); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                                        class="apexcharts-legend-text" rel="2" i="1"
                                                        data:default-text="Series%20B" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Series
                                                        B</span></div>
                                                <div class="apexcharts-legend-series" rel="3"
                                                    seriesname="SeriesxC" data:collapsed="false"
                                                    style="margin: 2px 5px;"><span class="apexcharts-legend-marker"
                                                        rel="3" data:collapsed="false"
                                                        style="background: rgb(52, 195, 143) !important; color: rgb(52, 195, 143); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                                        class="apexcharts-legend-text" rel="3" i="2"
                                                        data:default-text="Series%20C" data:collapsed="false"
                                                        style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Series
                                                        C</span></div>
                                            </div>
                                            <style type="text/css">
                                                .apexcharts-legend {
                                                    display: flex;
                                                    overflow: auto;
                                                    padding: 0 10px;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom,
                                                .apexcharts-legend.apx-legend-position-top {
                                                    flex-wrap: wrap
                                                }

                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    flex-direction: column;
                                                    bottom: 0;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                .apexcharts-legend.apx-legend-position-right,
                                                .apexcharts-legend.apx-legend-position-left {
                                                    justify-content: flex-start;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                    justify-content: center;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                    justify-content: flex-end;
                                                }

                                                .apexcharts-legend-series {
                                                    cursor: pointer;
                                                    line-height: normal;
                                                }

                                                .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                    display: flex;
                                                    align-items: center;
                                                }

                                                .apexcharts-legend-text {
                                                    position: relative;
                                                    font-size: 14px;
                                                }

                                                .apexcharts-legend-text *,
                                                .apexcharts-legend-marker * {
                                                    pointer-events: none;
                                                }

                                                .apexcharts-legend-marker {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                    margin-right: 3px;
                                                    border-style: solid;
                                                }

                                                .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                    display: inline-block;
                                                }

                                                .apexcharts-legend-series.apexcharts-no-click {
                                                    cursor: auto;
                                                }

                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                    display: none !important;
                                                }

                                                .apexcharts-inactive-legend {
                                                    opacity: 0.45;
                                                }
                                            </style>
                                        </foreignObject>
                                        <g id="SvgjsG1920" class="apexcharts-yaxis" rel="0"
                                            transform="translate(14.427978515625, 0)">
                                            <g id="SvgjsG1921" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1923"
                                                    font-family="Helvetica, Arial, sans-serif" x="20" y="32"
                                                    text-anchor="end" dominant-baseline="auto" font-size="11px"
                                                    font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1924">100</tspan>
                                                    <title>100</title>
                                                </text><text id="SvgjsText1926" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="58.3494" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1927">90</tspan>
                                                    <title>90</title>
                                                </text><text id="SvgjsText1929" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="84.6988" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1930">80</tspan>
                                                    <title>80</title>
                                                </text><text id="SvgjsText1932" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="111.04820000000001" text-anchor="end"
                                                    dominant-baseline="auto" font-size="11px" font-weight="400"
                                                    fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1933">70</tspan>
                                                    <title>70</title>
                                                </text><text id="SvgjsText1935" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="137.3976" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1936">60</tspan>
                                                    <title>60</title>
                                                </text><text id="SvgjsText1938" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="163.747" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1939">50</tspan>
                                                    <title>50</title>
                                                </text><text id="SvgjsText1941" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="190.09640000000002" text-anchor="end"
                                                    dominant-baseline="auto" font-size="11px" font-weight="400"
                                                    fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1942">40</tspan>
                                                    <title>40</title>
                                                </text><text id="SvgjsText1944" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="216.44580000000002" text-anchor="end"
                                                    dominant-baseline="auto" font-size="11px" font-weight="400"
                                                    fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1945">30</tspan>
                                                    <title>30</title>
                                                </text><text id="SvgjsText1947" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="242.79520000000002" text-anchor="end"
                                                    dominant-baseline="auto" font-size="11px" font-weight="400"
                                                    fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1948">20</tspan>
                                                    <title>20</title>
                                                </text><text id="SvgjsText1950" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="269.1446" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1951">10</tspan>
                                                    <title>10</title>
                                                </text><text id="SvgjsText1953" font-family="Helvetica, Arial, sans-serif"
                                                    x="20" y="295.494" text-anchor="end" dominant-baseline="auto"
                                                    font-size="11px" font-weight="400" fill="#373d3f"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1954">0</tspan>
                                                    <title>0</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG1757" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(44.427978515625, 30)">
                                            <defs id="SvgjsDefs1756">
                                                <linearGradient id="SvgjsLinearGradient1760" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop1761" stop-opacity="0.4"
                                                        stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1762" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1763" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskid3dmqnc">
                                                    <rect id="SvgjsRect1765" width="602.572021484375" height="267.494"
                                                        x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskid3dmqnc"></clipPath>
                                                <clipPath id="nonForecastMaskid3dmqnc"></clipPath>
                                                <clipPath id="gridRectMarkerMaskid3dmqnc">
                                                    <rect id="SvgjsRect1766" width="602.572021484375" height="267.494"
                                                        x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect1764" width="7.482150268554688" height="263.494" x="0"
                                                y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke-dasharray="3" fill="url(#SvgjsLinearGradient1760)"
                                                class="apexcharts-xcrosshairs" y2="263.494" filter="none"
                                                fill-opacity="0.9"></rect>
                                            <line id="SvgjsLine1853" x1="0" y1="264.494" x2="0"
                                                y2="270.494" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1854" x1="49.881001790364586" y1="264.494"
                                                x2="49.881001790364586" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1855" x1="99.76200358072917" y1="264.494"
                                                x2="99.76200358072917" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1856" x1="149.64300537109375" y1="264.494"
                                                x2="149.64300537109375" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1857" x1="199.52400716145834" y1="264.494"
                                                x2="199.52400716145834" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1858" x1="249.40500895182294" y1="264.494"
                                                x2="249.40500895182294" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1859" x1="299.2860107421875" y1="264.494"
                                                x2="299.2860107421875" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1860" x1="349.16701253255206" y1="264.494"
                                                x2="349.16701253255206" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1861" x1="399.04801432291663" y1="264.494"
                                                x2="399.04801432291663" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1862" x1="448.9290161132812" y1="264.494"
                                                x2="448.9290161132812" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1863" x1="498.81001790364576" y1="264.494"
                                                x2="498.81001790364576" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1864" x1="548.6910196940104" y1="264.494"
                                                x2="548.6910196940104" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <line id="SvgjsLine1865" x1="598.572021484375" y1="264.494"
                                                x2="598.572021484375" y2="270.494" stroke="#e0e0e0"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick">
                                            </line>
                                            <g id="SvgjsG1849" class="apexcharts-grid">
                                                <g id="SvgjsG1850" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine1867" x1="0" y1="26.349400000000003"
                                                        x2="598.572021484375" y2="26.349400000000003" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1868" x1="0" y1="52.698800000000006"
                                                        x2="598.572021484375" y2="52.698800000000006" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1869" x1="0" y1="79.04820000000001"
                                                        x2="598.572021484375" y2="79.04820000000001" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1870" x1="0" y1="105.39760000000001"
                                                        x2="598.572021484375" y2="105.39760000000001" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1871" x1="0" y1="131.747"
                                                        x2="598.572021484375" y2="131.747" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1872" x1="0" y1="158.09640000000002"
                                                        x2="598.572021484375" y2="158.09640000000002" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1873" x1="0" y1="184.44580000000002"
                                                        x2="598.572021484375" y2="184.44580000000002" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1874" x1="0" y1="210.79520000000002"
                                                        x2="598.572021484375" y2="210.79520000000002" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1875" x1="0" y1="237.14460000000003"
                                                        x2="598.572021484375" y2="237.14460000000003" stroke="#e0e0e0"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1851" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine1878" x1="0" y1="263.494"
                                                    x2="598.572021484375" y2="263.494" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1877" x1="0" y1="1" x2="0"
                                                    y2="263.494" stroke="transparent" stroke-dasharray="0"
                                                    stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1852" class="apexcharts-grid-borders">
                                                <line id="SvgjsLine1866" x1="0" y1="0"
                                                    x2="598.572021484375" y2="0" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1876" x1="0" y1="263.494"
                                                    x2="598.572021484375" y2="263.494" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1919" x1="0" y1="264.494"
                                                    x2="598.572021484375" y2="264.494" stroke="#e0e0e0"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1767" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1768" class="apexcharts-series" seriesName="SeriesxA"
                                                    rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1772"
                                                        d="M 21.199425760904948 263.495 L 21.199425760904948 147.55764000000002 L 28.681576029459634 147.55764000000002 L 28.681576029459634 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 21.199425760904948 263.495 L 21.199425760904948 147.55764000000002 L 28.681576029459634 147.55764000000002 L 28.681576029459634 263.495 z"
                                                        pathFrom="M 21.199425760904948 263.495 L 21.199425760904948 263.495 L 28.681576029459634 263.495 L 28.681576029459634 263.495 L 28.681576029459634 263.495 L 28.681576029459634 263.495 L 28.681576029459634 263.495 L 21.199425760904948 263.495 z"
                                                        cy="147.55664000000002" cx="71.08042755126954" j="0"
                                                        val="44" barHeight="115.93736000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1774"
                                                        d="M 71.08042755126954 263.495 L 71.08042755126954 118.57330000000002 L 78.56257781982423 118.57330000000002 L 78.56257781982423 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 71.08042755126954 263.495 L 71.08042755126954 118.57330000000002 L 78.56257781982423 118.57330000000002 L 78.56257781982423 263.495 z"
                                                        pathFrom="M 71.08042755126954 263.495 L 71.08042755126954 263.495 L 78.56257781982423 263.495 L 78.56257781982423 263.495 L 78.56257781982423 263.495 L 78.56257781982423 263.495 L 78.56257781982423 263.495 L 71.08042755126954 263.495 z"
                                                        cy="118.57230000000001" cx="120.96142934163413" j="1"
                                                        val="55" barHeight="144.92170000000002"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1776"
                                                        d="M 120.96142934163413 263.495 L 120.96142934163413 155.46246000000002 L 128.4435796101888 155.46246000000002 L 128.4435796101888 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 120.96142934163413 263.495 L 120.96142934163413 155.46246000000002 L 128.4435796101888 155.46246000000002 L 128.4435796101888 263.495 z"
                                                        pathFrom="M 120.96142934163413 263.495 L 120.96142934163413 263.495 L 128.4435796101888 263.495 L 128.4435796101888 263.495 L 128.4435796101888 263.495 L 128.4435796101888 263.495 L 128.4435796101888 263.495 L 120.96142934163413 263.495 z"
                                                        cy="155.46146000000002" cx="170.84243113199872" j="2"
                                                        val="41" barHeight="108.03254000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1778"
                                                        d="M 170.84243113199872 263.495 L 170.84243113199872 86.95402000000001 L 178.3245814005534 86.95402000000001 L 178.3245814005534 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 170.84243113199872 263.495 L 170.84243113199872 86.95402000000001 L 178.3245814005534 86.95402000000001 L 178.3245814005534 263.495 z"
                                                        pathFrom="M 170.84243113199872 263.495 L 170.84243113199872 263.495 L 178.3245814005534 263.495 L 178.3245814005534 263.495 L 178.3245814005534 263.495 L 178.3245814005534 263.495 L 178.3245814005534 263.495 L 170.84243113199872 263.495 z"
                                                        cy="86.95302000000001" cx="220.72343292236332" j="3"
                                                        val="67" barHeight="176.54098000000002"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1780"
                                                        d="M 220.72343292236332 263.495 L 220.72343292236332 205.52632000000003 L 228.205583190918 205.52632000000003 L 228.205583190918 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 220.72343292236332 263.495 L 220.72343292236332 205.52632000000003 L 228.205583190918 205.52632000000003 L 228.205583190918 263.495 z"
                                                        pathFrom="M 220.72343292236332 263.495 L 220.72343292236332 263.495 L 228.205583190918 263.495 L 228.205583190918 263.495 L 228.205583190918 263.495 L 228.205583190918 263.495 L 228.205583190918 263.495 L 220.72343292236332 263.495 z"
                                                        cy="205.52532000000002" cx="270.6044347127279" j="4"
                                                        val="22" barHeight="57.968680000000006"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1782"
                                                        d="M 270.6044347127279 263.495 L 270.6044347127279 150.19258000000002 L 278.08658498128256 150.19258000000002 L 278.08658498128256 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 270.6044347127279 263.495 L 270.6044347127279 150.19258000000002 L 278.08658498128256 150.19258000000002 L 278.08658498128256 263.495 z"
                                                        pathFrom="M 270.6044347127279 263.495 L 270.6044347127279 263.495 L 278.08658498128256 263.495 L 278.08658498128256 263.495 L 278.08658498128256 263.495 L 278.08658498128256 263.495 L 278.08658498128256 263.495 L 270.6044347127279 263.495 z"
                                                        cy="150.19158000000002" cx="320.48543650309244" j="5"
                                                        val="43" barHeight="113.30242000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1784"
                                                        d="M 320.48543650309244 263.495 L 320.48543650309244 168.63716000000002 L 327.9675867716471 168.63716000000002 L 327.9675867716471 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 320.48543650309244 263.495 L 320.48543650309244 168.63716000000002 L 327.9675867716471 168.63716000000002 L 327.9675867716471 263.495 z"
                                                        pathFrom="M 320.48543650309244 263.495 L 320.48543650309244 263.495 L 327.9675867716471 263.495 L 327.9675867716471 263.495 L 327.9675867716471 263.495 L 327.9675867716471 263.495 L 327.9675867716471 263.495 L 320.48543650309244 263.495 z"
                                                        cy="168.63616000000002" cx="370.366438293457" j="6"
                                                        val="36" barHeight="94.85784000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1786"
                                                        d="M 370.366438293457 263.495 L 370.366438293457 126.47812000000002 L 377.8485885620117 126.47812000000002 L 377.8485885620117 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 370.366438293457 263.495 L 370.366438293457 126.47812000000002 L 377.8485885620117 126.47812000000002 L 377.8485885620117 263.495 z"
                                                        pathFrom="M 370.366438293457 263.495 L 370.366438293457 263.495 L 377.8485885620117 263.495 L 377.8485885620117 263.495 L 377.8485885620117 263.495 L 377.8485885620117 263.495 L 377.8485885620117 263.495 L 370.366438293457 263.495 z"
                                                        cy="126.47712000000001" cx="420.2474400838216" j="7"
                                                        val="52" barHeight="137.01688000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1788"
                                                        d="M 420.2474400838216 263.495 L 420.2474400838216 200.25644000000003 L 427.72959035237625 200.25644000000003 L 427.72959035237625 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 420.2474400838216 263.495 L 420.2474400838216 200.25644000000003 L 427.72959035237625 200.25644000000003 L 427.72959035237625 263.495 z"
                                                        pathFrom="M 420.2474400838216 263.495 L 420.2474400838216 263.495 L 427.72959035237625 263.495 L 427.72959035237625 263.495 L 427.72959035237625 263.495 L 427.72959035237625 263.495 L 427.72959035237625 263.495 L 420.2474400838216 263.495 z"
                                                        cy="200.25544000000002" cx="470.12844187418614" j="8"
                                                        val="24" barHeight="63.23856000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1790"
                                                        d="M 470.12844187418614 263.495 L 470.12844187418614 216.06608000000003 L 477.6105921427408 216.06608000000003 L 477.6105921427408 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 470.12844187418614 263.495 L 470.12844187418614 216.06608000000003 L 477.6105921427408 216.06608000000003 L 477.6105921427408 263.495 z"
                                                        pathFrom="M 470.12844187418614 263.495 L 470.12844187418614 263.495 L 477.6105921427408 263.495 L 477.6105921427408 263.495 L 477.6105921427408 263.495 L 477.6105921427408 263.495 L 477.6105921427408 263.495 L 470.12844187418614 263.495 z"
                                                        cy="216.06508000000002" cx="520.0094436645508" j="9"
                                                        val="18" barHeight="47.428920000000005"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1792"
                                                        d="M 520.0094436645508 263.495 L 520.0094436645508 168.63716000000002 L 527.4915939331055 168.63716000000002 L 527.4915939331055 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 520.0094436645508 263.495 L 520.0094436645508 168.63716000000002 L 527.4915939331055 168.63716000000002 L 527.4915939331055 263.495 z"
                                                        pathFrom="M 520.0094436645508 263.495 L 520.0094436645508 263.495 L 527.4915939331055 263.495 L 527.4915939331055 263.495 L 527.4915939331055 263.495 L 527.4915939331055 263.495 L 527.4915939331055 263.495 L 520.0094436645508 263.495 z"
                                                        cy="168.63616000000002" cx="569.8904454549154" j="10"
                                                        val="36" barHeight="94.85784000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1794"
                                                        d="M 569.8904454549154 263.495 L 569.8904454549154 137.01788000000002 L 577.3725957234701 137.01788000000002 L 577.3725957234701 263.495 z"
                                                        fill="rgba(85,110,230,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 569.8904454549154 263.495 L 569.8904454549154 137.01788000000002 L 577.3725957234701 137.01788000000002 L 577.3725957234701 263.495 z"
                                                        pathFrom="M 569.8904454549154 263.495 L 569.8904454549154 263.495 L 577.3725957234701 263.495 L 577.3725957234701 263.495 L 577.3725957234701 263.495 L 577.3725957234701 263.495 L 577.3725957234701 263.495 L 569.8904454549154 263.495 z"
                                                        cy="137.01688000000001" cx="619.77144724528" j="11"
                                                        val="48" barHeight="126.47712000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <g id="SvgjsG1770" class="apexcharts-bar-goals-markers">
                                                        <g id="SvgjsG1771" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1773" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1775" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1777" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1779" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1781" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1783" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1785" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1787" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1789" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1791" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1793" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1795" class="apexcharts-series" seriesName="SeriesxB"
                                                    rel="2" data:realIndex="1">
                                                    <path id="SvgjsPath1799"
                                                        d="M 21.199425760904948 147.55864000000003 L 21.199425760904948 113.30442000000002 L 28.681576029459634 113.30442000000002 L 28.681576029459634 147.55864000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 21.199425760904948 147.55864000000003 L 21.199425760904948 113.30442000000002 L 28.681576029459634 113.30442000000002 L 28.681576029459634 147.55864000000003 z"
                                                        pathFrom="M 21.199425760904948 147.55864000000003 L 21.199425760904948 147.55864000000003 L 28.681576029459634 147.55864000000003 L 28.681576029459634 147.55864000000003 L 28.681576029459634 147.55864000000003 L 28.681576029459634 147.55864000000003 L 28.681576029459634 147.55864000000003 L 21.199425760904948 147.55864000000003 z"
                                                        cy="113.30342000000002" cx="71.08042755126954" j="0"
                                                        val="13" barHeight="34.254220000000004"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1801"
                                                        d="M 71.08042755126954 118.57430000000002 L 71.08042755126954 57.97068000000001 L 78.56257781982423 57.97068000000001 L 78.56257781982423 118.57430000000002 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 71.08042755126954 118.57430000000002 L 71.08042755126954 57.97068000000001 L 78.56257781982423 57.97068000000001 L 78.56257781982423 118.57430000000002 z"
                                                        pathFrom="M 71.08042755126954 118.57430000000002 L 71.08042755126954 118.57430000000002 L 78.56257781982423 118.57430000000002 L 78.56257781982423 118.57430000000002 L 78.56257781982423 118.57430000000002 L 78.56257781982423 118.57430000000002 L 78.56257781982423 118.57430000000002 L 71.08042755126954 118.57430000000002 z"
                                                        cy="57.96968000000001" cx="120.96142934163413" j="1"
                                                        val="23" barHeight="60.60362000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1803"
                                                        d="M 120.96142934163413 155.46346000000003 L 120.96142934163413 102.76466000000002 L 128.4435796101888 102.76466000000002 L 128.4435796101888 155.46346000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 120.96142934163413 155.46346000000003 L 120.96142934163413 102.76466000000002 L 128.4435796101888 102.76466000000002 L 128.4435796101888 155.46346000000003 z"
                                                        pathFrom="M 120.96142934163413 155.46346000000003 L 120.96142934163413 155.46346000000003 L 128.4435796101888 155.46346000000003 L 128.4435796101888 155.46346000000003 L 128.4435796101888 155.46346000000003 L 128.4435796101888 155.46346000000003 L 128.4435796101888 155.46346000000003 L 120.96142934163413 155.46346000000003 z"
                                                        cy="102.76366000000002" cx="170.84243113199872" j="2"
                                                        val="20" barHeight="52.698800000000006"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1805"
                                                        d="M 170.84243113199872 86.95502000000002 L 170.84243113199872 65.87550000000002 L 178.3245814005534 65.87550000000002 L 178.3245814005534 86.95502000000002 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 170.84243113199872 86.95502000000002 L 170.84243113199872 65.87550000000002 L 178.3245814005534 65.87550000000002 L 178.3245814005534 86.95502000000002 z"
                                                        pathFrom="M 170.84243113199872 86.95502000000002 L 170.84243113199872 86.95502000000002 L 178.3245814005534 86.95502000000002 L 178.3245814005534 86.95502000000002 L 178.3245814005534 86.95502000000002 L 178.3245814005534 86.95502000000002 L 178.3245814005534 86.95502000000002 L 170.84243113199872 86.95502000000002 z"
                                                        cy="65.87450000000001" cx="220.72343292236332" j="3"
                                                        val="8" barHeight="21.079520000000002"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1807"
                                                        d="M 220.72343292236332 205.52732000000003 L 220.72343292236332 171.27310000000003 L 228.205583190918 171.27310000000003 L 228.205583190918 205.52732000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 220.72343292236332 205.52732000000003 L 220.72343292236332 171.27310000000003 L 228.205583190918 171.27310000000003 L 228.205583190918 205.52732000000003 z"
                                                        pathFrom="M 220.72343292236332 205.52732000000003 L 220.72343292236332 205.52732000000003 L 228.205583190918 205.52732000000003 L 228.205583190918 205.52732000000003 L 228.205583190918 205.52732000000003 L 228.205583190918 205.52732000000003 L 228.205583190918 205.52732000000003 L 220.72343292236332 205.52732000000003 z"
                                                        cy="171.27210000000002" cx="270.6044347127279" j="4"
                                                        val="13" barHeight="34.254220000000004"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1809"
                                                        d="M 270.6044347127279 150.19358000000003 L 270.6044347127279 79.05020000000002 L 278.08658498128256 79.05020000000002 L 278.08658498128256 150.19358000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 270.6044347127279 150.19358000000003 L 270.6044347127279 79.05020000000002 L 278.08658498128256 79.05020000000002 L 278.08658498128256 150.19358000000003 z"
                                                        pathFrom="M 270.6044347127279 150.19358000000003 L 270.6044347127279 150.19358000000003 L 278.08658498128256 150.19358000000003 L 278.08658498128256 150.19358000000003 L 278.08658498128256 150.19358000000003 L 278.08658498128256 150.19358000000003 L 278.08658498128256 150.19358000000003 L 270.6044347127279 150.19358000000003 z"
                                                        cy="79.04920000000001" cx="320.48543650309244" j="5"
                                                        val="27" barHeight="71.14338000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1811"
                                                        d="M 320.48543650309244 168.63816000000003 L 320.48543650309244 121.20924000000002 L 327.9675867716471 121.20924000000002 L 327.9675867716471 168.63816000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 320.48543650309244 168.63816000000003 L 320.48543650309244 121.20924000000002 L 327.9675867716471 121.20924000000002 L 327.9675867716471 168.63816000000003 z"
                                                        pathFrom="M 320.48543650309244 168.63816000000003 L 320.48543650309244 168.63816000000003 L 327.9675867716471 168.63816000000003 L 327.9675867716471 168.63816000000003 L 327.9675867716471 168.63816000000003 L 327.9675867716471 168.63816000000003 L 327.9675867716471 168.63816000000003 L 320.48543650309244 168.63816000000003 z"
                                                        cy="121.20824000000002" cx="370.366438293457" j="6"
                                                        val="18" barHeight="47.428920000000005"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1813"
                                                        d="M 370.366438293457 126.47912000000002 L 370.366438293457 68.51044000000002 L 377.8485885620117 68.51044000000002 L 377.8485885620117 126.47912000000002 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 370.366438293457 126.47912000000002 L 370.366438293457 68.51044000000002 L 377.8485885620117 68.51044000000002 L 377.8485885620117 126.47912000000002 z"
                                                        pathFrom="M 370.366438293457 126.47912000000002 L 370.366438293457 126.47912000000002 L 377.8485885620117 126.47912000000002 L 377.8485885620117 126.47912000000002 L 377.8485885620117 126.47912000000002 L 377.8485885620117 126.47912000000002 L 377.8485885620117 126.47912000000002 L 370.366438293457 126.47912000000002 z"
                                                        cy="68.50944000000001" cx="420.2474400838216" j="7"
                                                        val="22" barHeight="57.968680000000006"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1815"
                                                        d="M 420.2474400838216 200.25744000000003 L 420.2474400838216 173.90804000000003 L 427.72959035237625 173.90804000000003 L 427.72959035237625 200.25744000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 420.2474400838216 200.25744000000003 L 420.2474400838216 173.90804000000003 L 427.72959035237625 173.90804000000003 L 427.72959035237625 200.25744000000003 z"
                                                        pathFrom="M 420.2474400838216 200.25744000000003 L 420.2474400838216 200.25744000000003 L 427.72959035237625 200.25744000000003 L 427.72959035237625 200.25744000000003 L 427.72959035237625 200.25744000000003 L 427.72959035237625 200.25744000000003 L 427.72959035237625 200.25744000000003 L 420.2474400838216 200.25744000000003 z"
                                                        cy="173.90704000000002" cx="470.12844187418614" j="8"
                                                        val="10" barHeight="26.349400000000003"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1817"
                                                        d="M 470.12844187418614 216.06708000000003 L 470.12844187418614 173.90804000000003 L 477.6105921427408 173.90804000000003 L 477.6105921427408 216.06708000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 470.12844187418614 216.06708000000003 L 470.12844187418614 173.90804000000003 L 477.6105921427408 173.90804000000003 L 477.6105921427408 216.06708000000003 z"
                                                        pathFrom="M 470.12844187418614 216.06708000000003 L 470.12844187418614 216.06708000000003 L 477.6105921427408 216.06708000000003 L 477.6105921427408 216.06708000000003 L 477.6105921427408 216.06708000000003 L 477.6105921427408 216.06708000000003 L 477.6105921427408 216.06708000000003 L 470.12844187418614 216.06708000000003 z"
                                                        cy="173.90704000000002" cx="520.0094436645508" j="9"
                                                        val="16" barHeight="42.159040000000005"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1819"
                                                        d="M 520.0094436645508 168.63816000000003 L 520.0094436645508 105.39960000000002 L 527.4915939331055 105.39960000000002 L 527.4915939331055 168.63816000000003 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 520.0094436645508 168.63816000000003 L 520.0094436645508 105.39960000000002 L 527.4915939331055 105.39960000000002 L 527.4915939331055 168.63816000000003 z"
                                                        pathFrom="M 520.0094436645508 168.63816000000003 L 520.0094436645508 168.63816000000003 L 527.4915939331055 168.63816000000003 L 527.4915939331055 168.63816000000003 L 527.4915939331055 168.63816000000003 L 527.4915939331055 168.63816000000003 L 527.4915939331055 168.63816000000003 L 520.0094436645508 168.63816000000003 z"
                                                        cy="105.39860000000002" cx="569.8904454549154" j="10"
                                                        val="24" barHeight="63.23856000000001"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1821"
                                                        d="M 569.8904454549154 137.01888000000002 L 569.8904454549154 79.05020000000002 L 577.3725957234701 79.05020000000002 L 577.3725957234701 137.01888000000002 z"
                                                        fill="rgba(241,180,76,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 569.8904454549154 137.01888000000002 L 569.8904454549154 79.05020000000002 L 577.3725957234701 79.05020000000002 L 577.3725957234701 137.01888000000002 z"
                                                        pathFrom="M 569.8904454549154 137.01888000000002 L 569.8904454549154 137.01888000000002 L 577.3725957234701 137.01888000000002 L 577.3725957234701 137.01888000000002 L 577.3725957234701 137.01888000000002 L 577.3725957234701 137.01888000000002 L 577.3725957234701 137.01888000000002 L 569.8904454549154 137.01888000000002 z"
                                                        cy="79.04920000000001" cx="619.77144724528" j="11"
                                                        val="22" barHeight="57.968680000000006"
                                                        barWidth="7.482150268554688"></path>
                                                    <g id="SvgjsG1797" class="apexcharts-bar-goals-markers">
                                                        <g id="SvgjsG1798" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1800" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1802" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1804" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1806" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1808" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1810" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1812" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1814" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1816" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1818" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1820" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1822" class="apexcharts-series" seriesName="SeriesxC"
                                                    rel="3" data:realIndex="2">
                                                    <path id="SvgjsPath1826"
                                                        d="M 21.199425760904948 113.30542000000003 L 21.199425760904948 89.32108000000002 C 21.199425760904948 86.82108000000002 23.699425760904948 84.32108000000002 26.199425760904948 84.32108000000002 L 26.199425760904948 84.32108000000002 C 27.44050089518229 84.32108000000002 28.681576029459634 86.82108000000002 28.681576029459634 89.32108000000002 L 28.681576029459634 113.30542000000003 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 21.199425760904948 113.30542000000003 L 21.199425760904948 89.32108000000002 C 21.199425760904948 86.82108000000002 23.699425760904948 84.32108000000002 26.199425760904948 84.32108000000002 L 26.199425760904948 84.32108000000002 C 27.44050089518229 84.32108000000002 28.681576029459634 86.82108000000002 28.681576029459634 89.32108000000002 L 28.681576029459634 113.30542000000003 z "
                                                        pathFrom="M 21.199425760904948 113.30542000000003 L 21.199425760904948 113.30542000000003 L 28.681576029459634 113.30542000000003 L 28.681576029459634 113.30542000000003 L 28.681576029459634 113.30542000000003 L 28.681576029459634 113.30542000000003 L 28.681576029459634 113.30542000000003 L 21.199425760904948 113.30542000000003 z"
                                                        cy="84.32008000000002" cx="71.08042755126954" j="0"
                                                        val="11" barHeight="28.984340000000003"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1828"
                                                        d="M 71.08042755126954 57.971680000000006 L 71.08042755126954 18.1777 C 71.08042755126954 15.677700000000002 73.58042755126954 13.177700000000003 76.08042755126954 13.177700000000003 L 76.08042755126954 13.177700000000003 C 77.32150268554688 13.177700000000003 78.56257781982423 15.677700000000002 78.56257781982423 18.1777 L 78.56257781982423 57.971680000000006 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 71.08042755126954 57.971680000000006 L 71.08042755126954 18.1777 C 71.08042755126954 15.677700000000002 73.58042755126954 13.177700000000003 76.08042755126954 13.177700000000003 L 76.08042755126954 13.177700000000003 C 77.32150268554688 13.177700000000003 78.56257781982423 15.677700000000002 78.56257781982423 18.1777 L 78.56257781982423 57.971680000000006 z "
                                                        pathFrom="M 71.08042755126954 57.971680000000006 L 71.08042755126954 57.971680000000006 L 78.56257781982423 57.971680000000006 L 78.56257781982423 57.971680000000006 L 78.56257781982423 57.971680000000006 L 78.56257781982423 57.971680000000006 L 78.56257781982423 57.971680000000006 L 71.08042755126954 57.971680000000006 z"
                                                        cy="13.176700000000004" cx="120.96142934163413" j="1"
                                                        val="17" barHeight="44.793980000000005"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1830"
                                                        d="M 120.96142934163413 102.76566000000003 L 120.96142934163413 68.24156000000002 C 120.96142934163413 65.74156000000002 123.46142934163413 63.241560000000014 125.96142934163413 63.241560000000014 L 125.96142934163413 63.241560000000014 C 127.20250447591147 63.241560000000014 128.4435796101888 65.74156000000002 128.4435796101888 68.24156000000002 L 128.4435796101888 102.76566000000003 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 120.96142934163413 102.76566000000003 L 120.96142934163413 68.24156000000002 C 120.96142934163413 65.74156000000002 123.46142934163413 63.241560000000014 125.96142934163413 63.241560000000014 L 125.96142934163413 63.241560000000014 C 127.20250447591147 63.241560000000014 128.4435796101888 65.74156000000002 128.4435796101888 68.24156000000002 L 128.4435796101888 102.76566000000003 z "
                                                        pathFrom="M 120.96142934163413 102.76566000000003 L 120.96142934163413 102.76566000000003 L 128.4435796101888 102.76566000000003 L 128.4435796101888 102.76566000000003 L 128.4435796101888 102.76566000000003 L 128.4435796101888 102.76566000000003 L 128.4435796101888 102.76566000000003 L 120.96142934163413 102.76566000000003 z"
                                                        cy="63.240560000000016" cx="170.84243113199872" j="2"
                                                        val="15" barHeight="39.524100000000004"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1832"
                                                        d="M 170.84243113199872 65.87650000000002 L 170.84243113199872 31.352400000000014 C 170.84243113199872 28.852400000000014 173.34243113199872 26.352400000000014 175.84243113199872 26.352400000000014 L 175.84243113199872 26.352400000000014 C 177.08350626627606 26.352400000000014 178.3245814005534 28.852400000000014 178.3245814005534 31.352400000000014 L 178.3245814005534 65.87650000000002 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 170.84243113199872 65.87650000000002 L 170.84243113199872 31.352400000000014 C 170.84243113199872 28.852400000000014 173.34243113199872 26.352400000000014 175.84243113199872 26.352400000000014 L 175.84243113199872 26.352400000000014 C 177.08350626627606 26.352400000000014 178.3245814005534 28.852400000000014 178.3245814005534 31.352400000000014 L 178.3245814005534 65.87650000000002 z "
                                                        pathFrom="M 170.84243113199872 65.87650000000002 L 170.84243113199872 65.87650000000002 L 178.3245814005534 65.87650000000002 L 178.3245814005534 65.87650000000002 L 178.3245814005534 65.87650000000002 L 178.3245814005534 65.87650000000002 L 178.3245814005534 65.87650000000002 L 170.84243113199872 65.87650000000002 z"
                                                        cy="26.351400000000012" cx="220.72343292236332" j="3"
                                                        val="15" barHeight="39.524100000000004"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1834"
                                                        d="M 220.72343292236332 171.27410000000003 L 220.72343292236332 120.94036000000003 C 220.72343292236332 118.44036000000003 223.22343292236332 115.94036000000003 225.72343292236332 115.94036000000003 L 225.72343292236332 115.94036000000003 C 226.96450805664065 115.94036000000003 228.205583190918 118.44036000000003 228.205583190918 120.94036000000003 L 228.205583190918 171.27410000000003 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 220.72343292236332 171.27410000000003 L 220.72343292236332 120.94036000000003 C 220.72343292236332 118.44036000000003 223.22343292236332 115.94036000000003 225.72343292236332 115.94036000000003 L 225.72343292236332 115.94036000000003 C 226.96450805664065 115.94036000000003 228.205583190918 118.44036000000003 228.205583190918 120.94036000000003 L 228.205583190918 171.27410000000003 z "
                                                        pathFrom="M 220.72343292236332 171.27410000000003 L 220.72343292236332 171.27410000000003 L 228.205583190918 171.27410000000003 L 228.205583190918 171.27410000000003 L 228.205583190918 171.27410000000003 L 228.205583190918 171.27410000000003 L 228.205583190918 171.27410000000003 L 220.72343292236332 171.27410000000003 z"
                                                        cy="115.93936000000002" cx="270.6044347127279" j="4"
                                                        val="21" barHeight="55.333740000000006"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1836"
                                                        d="M 270.6044347127279 79.05120000000002 L 270.6044347127279 47.16204000000001 C 270.6044347127279 44.66204000000001 273.1044347127279 42.16204000000001 275.6044347127279 42.16204000000001 L 275.6044347127279 42.16204000000001 C 276.84550984700525 42.16204000000001 278.08658498128256 44.66204000000001 278.08658498128256 47.16204000000001 L 278.08658498128256 79.05120000000002 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 270.6044347127279 79.05120000000002 L 270.6044347127279 47.16204000000001 C 270.6044347127279 44.66204000000001 273.1044347127279 42.16204000000001 275.6044347127279 42.16204000000001 L 275.6044347127279 42.16204000000001 C 276.84550984700525 42.16204000000001 278.08658498128256 44.66204000000001 278.08658498128256 47.16204000000001 L 278.08658498128256 79.05120000000002 z "
                                                        pathFrom="M 270.6044347127279 79.05120000000002 L 270.6044347127279 79.05120000000002 L 278.08658498128256 79.05120000000002 L 278.08658498128256 79.05120000000002 L 278.08658498128256 79.05120000000002 L 278.08658498128256 79.05120000000002 L 278.08658498128256 79.05120000000002 L 270.6044347127279 79.05120000000002 z"
                                                        cy="42.161040000000014" cx="320.48543650309244" j="5"
                                                        val="14" barHeight="36.889160000000004"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1838"
                                                        d="M 320.48543650309244 121.21024000000003 L 320.48543650309244 97.22590000000002 C 320.48543650309244 94.72590000000002 322.98543650309244 92.22590000000002 325.48543650309244 92.22590000000002 L 325.48543650309244 92.22590000000002 C 326.72651163736975 92.22590000000002 327.9675867716471 94.72590000000002 327.9675867716471 97.22590000000002 L 327.9675867716471 121.21024000000003 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 320.48543650309244 121.21024000000003 L 320.48543650309244 97.22590000000002 C 320.48543650309244 94.72590000000002 322.98543650309244 92.22590000000002 325.48543650309244 92.22590000000002 L 325.48543650309244 92.22590000000002 C 326.72651163736975 92.22590000000002 327.9675867716471 94.72590000000002 327.9675867716471 97.22590000000002 L 327.9675867716471 121.21024000000003 z "
                                                        pathFrom="M 320.48543650309244 121.21024000000003 L 320.48543650309244 121.21024000000003 L 327.9675867716471 121.21024000000003 L 327.9675867716471 121.21024000000003 L 327.9675867716471 121.21024000000003 L 327.9675867716471 121.21024000000003 L 327.9675867716471 121.21024000000003 L 320.48543650309244 121.21024000000003 z"
                                                        cy="92.22490000000002" cx="370.366438293457" j="6"
                                                        val="11" barHeight="28.984340000000003"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1840"
                                                        d="M 370.366438293457 68.51144000000002 L 370.366438293457 26.082520000000013 C 370.366438293457 23.582520000000013 372.866438293457 21.082520000000013 375.366438293457 21.082520000000013 L 375.366438293457 21.082520000000013 C 376.6075134277344 21.082520000000013 377.8485885620117 23.582520000000013 377.8485885620117 26.082520000000013 L 377.8485885620117 68.51144000000002 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 370.366438293457 68.51144000000002 L 370.366438293457 26.082520000000013 C 370.366438293457 23.582520000000013 372.866438293457 21.082520000000013 375.366438293457 21.082520000000013 L 375.366438293457 21.082520000000013 C 376.6075134277344 21.082520000000013 377.8485885620117 23.582520000000013 377.8485885620117 26.082520000000013 L 377.8485885620117 68.51144000000002 z "
                                                        pathFrom="M 370.366438293457 68.51144000000002 L 370.366438293457 68.51144000000002 L 377.8485885620117 68.51144000000002 L 377.8485885620117 68.51144000000002 L 377.8485885620117 68.51144000000002 L 377.8485885620117 68.51144000000002 L 377.8485885620117 68.51144000000002 L 370.366438293457 68.51144000000002 z"
                                                        cy="21.081520000000012" cx="420.2474400838216" j="7"
                                                        val="18" barHeight="47.428920000000005"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1842"
                                                        d="M 420.2474400838216 173.90904000000003 L 420.2474400838216 134.11506000000003 C 420.2474400838216 131.61506000000003 422.7474400838216 129.11506000000003 425.2474400838216 129.11506000000003 L 425.2474400838216 129.11506000000003 C 426.4885152180989 129.11506000000003 427.72959035237625 131.61506000000003 427.72959035237625 134.11506000000003 L 427.72959035237625 173.90904000000003 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 420.2474400838216 173.90904000000003 L 420.2474400838216 134.11506000000003 C 420.2474400838216 131.61506000000003 422.7474400838216 129.11506000000003 425.2474400838216 129.11506000000003 L 425.2474400838216 129.11506000000003 C 426.4885152180989 129.11506000000003 427.72959035237625 131.61506000000003 427.72959035237625 134.11506000000003 L 427.72959035237625 173.90904000000003 z "
                                                        pathFrom="M 420.2474400838216 173.90904000000003 L 420.2474400838216 173.90904000000003 L 427.72959035237625 173.90904000000003 L 427.72959035237625 173.90904000000003 L 427.72959035237625 173.90904000000003 L 427.72959035237625 173.90904000000003 L 427.72959035237625 173.90904000000003 L 420.2474400838216 173.90904000000003 z"
                                                        cy="129.11406000000002" cx="470.12844187418614" j="8"
                                                        val="17" barHeight="44.793980000000005"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1844"
                                                        d="M 470.12844187418614 173.90904000000003 L 470.12844187418614 147.28976000000003 C 470.12844187418614 144.78976000000003 472.62844187418614 142.28976000000003 475.12844187418614 142.28976000000003 L 475.12844187418614 142.28976000000003 C 476.3695170084635 142.28976000000003 477.6105921427408 144.78976000000003 477.6105921427408 147.28976000000003 L 477.6105921427408 173.90904000000003 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 470.12844187418614 173.90904000000003 L 470.12844187418614 147.28976000000003 C 470.12844187418614 144.78976000000003 472.62844187418614 142.28976000000003 475.12844187418614 142.28976000000003 L 475.12844187418614 142.28976000000003 C 476.3695170084635 142.28976000000003 477.6105921427408 144.78976000000003 477.6105921427408 147.28976000000003 L 477.6105921427408 173.90904000000003 z "
                                                        pathFrom="M 470.12844187418614 173.90904000000003 L 470.12844187418614 173.90904000000003 L 477.6105921427408 173.90904000000003 L 477.6105921427408 173.90904000000003 L 477.6105921427408 173.90904000000003 L 477.6105921427408 173.90904000000003 L 477.6105921427408 173.90904000000003 L 470.12844187418614 173.90904000000003 z"
                                                        cy="142.28876000000002" cx="520.0094436645508" j="9"
                                                        val="12" barHeight="31.619280000000003"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1846"
                                                        d="M 520.0094436645508 105.40060000000003 L 520.0094436645508 57.70180000000001 C 520.0094436645508 55.20180000000001 522.5094436645508 52.70180000000001 525.0094436645508 52.70180000000001 L 525.0094436645508 52.70180000000001 C 526.2505187988281 52.70180000000001 527.4915939331055 55.20180000000001 527.4915939331055 57.70180000000001 L 527.4915939331055 105.40060000000003 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 520.0094436645508 105.40060000000003 L 520.0094436645508 57.70180000000001 C 520.0094436645508 55.20180000000001 522.5094436645508 52.70180000000001 525.0094436645508 52.70180000000001 L 525.0094436645508 52.70180000000001 C 526.2505187988281 52.70180000000001 527.4915939331055 55.20180000000001 527.4915939331055 57.70180000000001 L 527.4915939331055 105.40060000000003 z "
                                                        pathFrom="M 520.0094436645508 105.40060000000003 L 520.0094436645508 105.40060000000003 L 527.4915939331055 105.40060000000003 L 527.4915939331055 105.40060000000003 L 527.4915939331055 105.40060000000003 L 527.4915939331055 105.40060000000003 L 527.4915939331055 105.40060000000003 L 520.0094436645508 105.40060000000003 z"
                                                        cy="52.700800000000015" cx="569.8904454549154" j="10"
                                                        val="20" barHeight="52.698800000000006"
                                                        barWidth="7.482150268554688"></path>
                                                    <path id="SvgjsPath1848"
                                                        d="M 569.8904454549154 79.05120000000002 L 569.8904454549154 36.62228000000002 C 569.8904454549154 34.12228000000002 572.3904454549154 31.622280000000014 574.8904454549154 31.622280000000014 L 574.8904454549154 31.622280000000014 C 576.1315205891927 31.622280000000014 577.3725957234701 34.12228000000002 577.3725957234701 36.62228000000002 L 577.3725957234701 79.05120000000002 z "
                                                        fill="rgba(52,195,143,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="2"
                                                        clip-path="url(#gridRectMaskid3dmqnc)"
                                                        pathTo="M 569.8904454549154 79.05120000000002 L 569.8904454549154 36.62228000000002 C 569.8904454549154 34.12228000000002 572.3904454549154 31.622280000000014 574.8904454549154 31.622280000000014 L 574.8904454549154 31.622280000000014 C 576.1315205891927 31.622280000000014 577.3725957234701 34.12228000000002 577.3725957234701 36.62228000000002 L 577.3725957234701 79.05120000000002 z "
                                                        pathFrom="M 569.8904454549154 79.05120000000002 L 569.8904454549154 79.05120000000002 L 577.3725957234701 79.05120000000002 L 577.3725957234701 79.05120000000002 L 577.3725957234701 79.05120000000002 L 577.3725957234701 79.05120000000002 L 577.3725957234701 79.05120000000002 L 569.8904454549154 79.05120000000002 z"
                                                        cy="31.621280000000013" cx="619.77144724528" j="11"
                                                        val="18" barHeight="47.428920000000005"
                                                        barWidth="7.482150268554688"></path>
                                                    <g id="SvgjsG1824" class="apexcharts-bar-goals-markers">
                                                        <g id="SvgjsG1825" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1827" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1829" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1831" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1833" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1835" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1837" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1839" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1841" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1843" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1845" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                        <g id="SvgjsG1847" className="apexcharts-bar-goals-groups"
                                                            class="apexcharts-hidden-element-shown"
                                                            clip-path="url(#gridRectMarkerMaskid3dmqnc)"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1769" class="apexcharts-datalabels" data:realIndex="0">
                                                </g>
                                                <g id="SvgjsG1796" class="apexcharts-datalabels" data:realIndex="1">
                                                </g>
                                                <g id="SvgjsG1823" class="apexcharts-datalabels" data:realIndex="2">
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1879" x1="0" y1="0"
                                                x2="598.572021484375" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1880" x1="0" y1="0"
                                                x2="598.572021484375" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1881" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1882" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"><text id="SvgjsText1884"
                                                        font-family="Helvetica, Arial, sans-serif" x="24.940500895182293"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1885">Jan</tspan>
                                                        <title>Jan</title>
                                                    </text><text id="SvgjsText1887"
                                                        font-family="Helvetica, Arial, sans-serif" x="74.82150268554688"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1888">Feb</tspan>
                                                        <title>Feb</title>
                                                    </text><text id="SvgjsText1890"
                                                        font-family="Helvetica, Arial, sans-serif" x="124.70250447591145"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1891">Mar</tspan>
                                                        <title>Mar</title>
                                                    </text><text id="SvgjsText1893"
                                                        font-family="Helvetica, Arial, sans-serif" x="174.58350626627606"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1894">Apr</tspan>
                                                        <title>Apr</title>
                                                    </text><text id="SvgjsText1896"
                                                        font-family="Helvetica, Arial, sans-serif" x="224.46450805664065"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1897">May</tspan>
                                                        <title>May</title>
                                                    </text><text id="SvgjsText1899"
                                                        font-family="Helvetica, Arial, sans-serif" x="274.3455098470052"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1900">Jun</tspan>
                                                        <title>Jun</title>
                                                    </text><text id="SvgjsText1902"
                                                        font-family="Helvetica, Arial, sans-serif" x="324.22651163736975"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1903">Jul</tspan>
                                                        <title>Jul</title>
                                                    </text><text id="SvgjsText1905"
                                                        font-family="Helvetica, Arial, sans-serif" x="374.1075134277343"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1906">Aug</tspan>
                                                        <title>Aug</title>
                                                    </text><text id="SvgjsText1908"
                                                        font-family="Helvetica, Arial, sans-serif" x="423.9885152180989"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1909">Sep</tspan>
                                                        <title>Sep</title>
                                                    </text><text id="SvgjsText1911"
                                                        font-family="Helvetica, Arial, sans-serif" x="473.86951700846345"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1912">Oct</tspan>
                                                        <title>Oct</title>
                                                    </text><text id="SvgjsText1914"
                                                        font-family="Helvetica, Arial, sans-serif" x="523.7505187988281"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1915">Nov</tspan>
                                                        <title>Nov</title>
                                                    </text><text id="SvgjsText1917"
                                                        font-family="Helvetica, Arial, sans-serif" x="573.6315205891927"
                                                        y="292.494" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="12px" font-weight="400" fill="#373d3f"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1918">Dec</tspan>
                                                        <title>Dec</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1955" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1956" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1957" class="apexcharts-point-annotations"></g>
                                        </g>
                                    </svg>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(85, 110, 230);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(241, 180, 76);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(52, 195, 143);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@if (session('success') == 200)
    @section('script')
        <script>
            Swal.fire({
                toast: true,
                icon: "success",
                title: "Welcome back to Dashboard...!",
                animation: false,
                position: "top-right",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endsection
@endif
@section('script')
    <script>
        function updateDigitalClock() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const ampm = (hours >= 12) ? 'PM' : 'AM';
            const formattedHours = (hours % 12 === 0) ? 12 : hours % 12;
            const digitalClock = document.getElementById('digital-clock');
            digitalClock.textContent =
                `${formatTwoDigits(formattedHours)}:${formatTwoDigits(minutes)}:${formatTwoDigits(seconds)} ${ampm}`;
        }

        function formatTwoDigits(number) {
            return (number < 10) ? `0${number}` : number;
        }
        setInterval(updateDigitalClock, 1000);
        updateDigitalClock();
    </script>
@endsection
