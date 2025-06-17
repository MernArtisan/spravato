@extends('admin.layouts.master')
@section('title', 'Spravato | Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                @php
                                
                                    use Carbon\Carbon;

                                    $currentHour = Carbon::now('UTC')->format('H');
                                    if ($currentHour >= 5 && $currentHour < 12) {
                                        $greeting = 'Good Morning';
                                    } elseif ($currentHour >= 12 && $currentHour < 17) {
                                        $greeting = 'Good Afternoon';
                                    } elseif ($currentHour >= 17 && $currentHour < 21) {
                                        $greeting = 'Good Evening';
                                    } else {
                                        $greeting = 'Good Night';
                                    }
                                @endphp
                                <h4 class="mt-0">Hello ! {{ Auth::user()->name }}</h4>
                                <p class="text-muted">{{ $greeting }}! Have a nice day.</p>

                                <div class="row justify-content-center">
                                    <div class="col-md-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="dripicons-user-group font-24 text-secondary"></i>
                                                </div>
                                                <span class="badge badge-danger">Sessions</span>
                                                <h3 class="font-weight-bold">24k</h3>
                                                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>New Sessions Today
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="dripicons-cart  font-20 text-secondary"></i>
                                                </div>
                                                <span class="badge badge-info">Avg.Sessions</span>
                                                <h3 class="font-weight-bold">00:18</h3>
                                                <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>1.5%</span>Weekly Avg.Sessions</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="dripicons-jewel font-20 text-secondary"></i>
                                                </div>
                                                <span class="badge badge-warning">Bounce Rate</span>
                                                <h3 class="font-weight-bold">$2400</h3>
                                                <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>35%</span> Bounce Rate Weekly
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="dripicons-wallet font-20 text-secondary"></i>
                                                </div>
                                                <span class="badge badge-success">Goal Completions</span>
                                                <h3 class="font-weight-bold">85000</h3>
                                                <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Completions Weekly
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-self-center">
                                <img src="{{asset('admin/assets/images/dash.svg')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div> 
            </div>  
        </div> 
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Overview</h4>
                        <div class="chart-demo dash-apex-chart">
                            <div id="d2_overview" class="apex-charts"></div>
                        </div>
                    </div> 
                </div> 
            </div>  
        </div> 

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Performance Report</h4>
                        <div class="chart-demo dash-apex-chart">
                            <div id="d2_performance" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Users by (Only USA)</h4>
                        <div id="user_usa" class="dashboard-map"></div>
                    </div> 
                </div> 
            </div>  
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Visits of Males & Females</h4>
                        <div class="xender-visits mt-4">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="fas fa-male"></i>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="font-weight-bold">1254</h3>
                                    <p class="mb-0 text-muted">Visitors on Site now</p>
                                </div>
                                <div class="col-sm-3">
                                    <i class="fas fa-female female"></i>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div id="d2_visitors" class="apex-charts"></div>
                        </div>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-4">
                                    <h4 class="">5203</h4>
                                    <p class="mb-0 text-muted font-13 text-truncate">Today's Visits</p>
                                </div>
                                <div class="col-4">
                                    <h4 class="">55203</h4>
                                    <p class="mb-0 text-muted font-13 text-truncate">Last Week Visits</p>
                                </div>
                                <div class="col-4">
                                    <h4 class="">98020</h4>
                                    <p class="mb-0 text-muted font-13 text-truncate">Last Month Visits</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0">Social Report</h4>
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Network</th>
                                        <th>Sessions</th>
                                        <th>Con.Rate</th>
                                        <th>Avg.Time</th>
                                        <th>Bounce Rate</th>
                                        <th>%Change</th>
                                    </tr><!--end tr-->
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><i class="mdi mdi-google text-danger mr-1 font-18"></i>Google</td>
                                        <td>4541</td>
                                        <td>3.2%</td>
                                        <td>3:20</td>
                                        <td>57.8%</td>
                                        <td>17.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-yahoo text-info mr-1 font-18"></i>Yahoo</td>
                                        <td>1522</td>
                                        <td>4.2%</td>
                                        <td>4:20</td>
                                        <td>62.8%</td>
                                        <td>-12.8% <i class="mdi mdi-arrow-down-drop-circle-outline text-danger ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-web text-info mr-1 font-18"></i>UC Browser</td>
                                        <td>1292</td>
                                        <td>3.2%</td>
                                        <td>5:20</td>
                                        <td>33.8%</td>
                                        <td>17.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-facebook text-primary mr-1 font-18"></i>Facebook</td>
                                        <td>2241</td>
                                        <td>4.9%</td>
                                        <td>2:20</td>
                                        <td>48.8%</td>
                                        <td>17.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-twitter text-primary mr-1 font-18"></i>Twitter</td>
                                        <td>6806</td>
                                        <td>3.2%</td>
                                        <td>3:20</td>
                                        <td>57.8%</td>
                                        <td>-11.8% <i class="mdi mdi-arrow-down-drop-circle-outline text-danger ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-linkedin text-info mr-1 font-18"></i>LinkedIn</td>
                                        <td>4541</td>
                                        <td>3.2%</td>
                                        <td>3:20</td>
                                        <td>52.8%</td>
                                        <td>17.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-pinterest text-pink mr-1 font-18"></i>Pinterest</td>
                                        <td>3542</td>
                                        <td>8.2%</td>
                                        <td>6:20</td>
                                        <td>61.8%</td>
                                        <td>23.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-google-plus text-danger mr-1 font-18"></i>Google+</td>
                                        <td>1124</td>
                                        <td>9.2%</td>
                                        <td>4:10</td>
                                        <td>20.8%</td>
                                        <td>-9.8% <i class="mdi mdi-arrow-down-drop-circle-outline text-danger ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-instagram text-success mr-1 font-18"></i>Instagram</td>
                                        <td>3521</td>
                                        <td>1.2%</td>
                                        <td>6:45</td>
                                        <td>66.2%</td>
                                        <td>34.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-whatsapp text-success mr-1 font-18"></i>WhatsApp</td>
                                        <td>96547</td>
                                        <td>9.2%</td>
                                        <td>1:20</td>
                                        <td>57.8%</td>
                                        <td>48.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->
                                    <tr>
                                        <td><i class="mdi mdi-google-play text-warning mr-1 font-18"></i>Other</td>
                                        <td>3214</td>
                                        <td>6.2%</td>
                                        <td>4:40</td>
                                        <td>36.8%</td>
                                        <td>11.8% <i class="mdi mdi-arrow-up-drop-circle-outline text-success ml-1"></i>
                                        </td>
                                    </tr><!--end tr-->

                                </tbody>
                            </table>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div>
@endsection