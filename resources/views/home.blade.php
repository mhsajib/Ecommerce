@extends('layouts.app')
@section('content')
<!-- content wrpper -->
{{-- <div class="content_wrapper">
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                             <span><i class="fa fa-code"></i></span>
                              <h2 class="timer count-number" data-to="300" data-speed="1500"></h2>
                        </div>
                     
                       <p class="count-text ">SomeText GoesHere</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fa fa-coffee"></i></span>
                             <h2 class="timer count-number" data-to="1700" data-speed="1500"></h2>
                        </div>
                        <p class="count-text ">SomeText GoesHere</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fas fa-user"></i></span>
                             <h2 class="timer count-number" data-to="11900" data-speed="1500"></h2>
                        </div>
                        <p class="count-text ">SomeText GoesHere</p>
                          
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fa fa-bug"></i></span>
                             <h2 class="timer count-number" data-to="157" data-speed="1500"></h2>
                        </div>
                         <p class="count-text ">SomeText GoesHere</p>
                    </div>
                </div>
            </div>
        </section>
        <!--/ counter_area -->
        <!-- table area -->
        <section class="table_area">
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title"><span>FooTable with row toggler, sorting, filter and pagination</span></div>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Job Title</th>
                                  <th>Started On</th>
                                  <th data-hide="all">Date of Birth</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>Dennise</td>
                                  <td>Fuhrman</td>
                                  <td>High School History Teacher</td>
                                  <td>November 8th 2011</td>
                                  <td>July 25th 1960</td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Elodia</td>
                                  <td>Weisz</td>
                                  <td>Wallpaperer Helper</td>
                                  <td>October 15th 2010</td>
                                  <td>March 30th 1982</td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Raeann</td>
                                  <td>Haner</td>
                                  <td>Internal Medicine Nurse Practitioner</td>
                                  <td>November 28th 2013</td>
                                  <td>February 26th 1966</td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>Junie</td>
                                  <td>Landa</td>
                                  <td>Offbearer</td>
                                  <td>October 31st 2010</td>
                                  <td>March 29th 1966</td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>Solomon</td>
                                  <td>Bittinger</td>
                                  <td>Roller Skater</td>
                                  <td>December 29th 2011</td>
                                  <td>September 22nd 1964</td>
                              </tr>
                              <tr>
                                  <td>6</td>
                                  <td>Bar</td>
                                  <td>Lewis</td>
                                  <td>Clown</td>
                                  <td>November 12th 2012</td>
                                  <td>August 4th 1991</td>
                              </tr>
                              <tr>
                                  <td>7</td>
                                  <td>Usha</td>
                                  <td>Leak</td>
                                  <td>Ships Electronic Warfare Officer</td>
                                  <td>August 14th 2012</td>
                                  <td>November 20th 1979</td>
                              </tr>
                              <tr>
                                  <td>8</td>
                                  <td>Lorriane</td>
                                  <td>Cooke</td>
                                  <td>Technical Services Librarian</td>
                                  <td>September 21st 2010</td>
                                  <td>April 7th 1969</td>
                              </tr>
                              <tr>
                                  <td>9</td>
                                  <td>Lorriane</td>
                                  <td>Cooke</td>
                                  <td>Technical Services Librarian</td>
                                  <td>September 21st 2010</td>
                                  <td>April 7th 1969</td>
                              </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- /table -->
            <!-- chart area -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel chart_area">
                        <div class="panel_header">
                            <div class="panel_title">
                                <span class="panel_icon"><i class="far fa-chart-bar"></i></span>
                                <span>bar chat</span>
                            </div>
                        </div>
                        <div class="panel_body">
                            <div id="bar-chart">
                                <div id="bar-legend"></div>
                                <canvas id="bar-canvas" ></canvas>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel_header">
                            <div class="panel_title">
                                <span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
                                <span>pie chat</span>
                            </div>
                        </div>
                        <div class="panel_body">
                            <div id="piechart"></div>
                        </div>
                    </div> 
                </div>
            </div>
        </section>                   
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper --> --}}

{{-- <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a> --}}

<div class="contact_form">
    <div class="container">
        <div class="row">
           <div class="col-8 card">
             <table class="table table-response">
               <thead>
                 <tr>
                   <th scope="col">PaymentType</th>
                   <th scope="col">Payment ID</th>
                   <th scope="col">Amount</th>
                   <th scope="col">Date</th>
                    <th scope="col">Status Code</th>
                    <th scope="col">Status </th>
                    <th scope="col">Action</th>
                 </tr>
               </thead>
               <tbody>
                {{-- @foreach($order as $row) --}}
                 <tr>
                   <th>test</th>
                   <td>test</td>
                   <td>test</td>
                   <td>test</td>
                   <td>test</td>
                   {{-- <td>
                       @if($row->status == 0)
                        <span class="badge badge-warning">Pending</span>
                       @elseif($row->status == 1)
                       <span class="badge badge-info">Payment Accept</span>
                       @elseif($row->status == 2) 
                        <span class="badge badge-info">Progress </span>
                        @elseif($row->status == 3)  
                        <span class="badge badge-success">Delevered </span>
                        @else
                        <span class="badge badge-danger">Cancel </span>
                        @endif
                   </td> --}}
                   <td>test</td>
                   <td>
                     <a href="#" class="btn btn-sm btn-info">View</a>
                   </td>
                 </tr>
                {{-- @endforeach --}}
               </tbody>
             </table>
           </div>
           <div class="col-4">
             <div class="card" style="width: 18rem;">
              <img src="" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
              <div class="card-body">
                <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ route('password.change') }}"> Password Change </a></li>
                <li class="list-group-item"><a href="#"> Edit Profile </a></li>
                <li class="list-group-item"><a href="#"> Return Order </a></li>
              </ul>
              <div class="card-body">
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
              </div>
            </div>
           </div>
        </div>
    </div>
</div>

@endsection
