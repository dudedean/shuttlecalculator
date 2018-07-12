@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

    {{-- <img src="image/banner.jpg" alt="" class="responsive-img" style="padding-top:15px"> --}}

    <div class="container" id="app">

      {{-- Main Card --}}

      <card size="col s12 m12" color="" text="black-text" style="padding-top:15px;">

        <div slot="title"><h3>Welcome to Badminton Shuttle Calculator</h3></div>

        <br>

        <div slot="body">
          
          <h6>This application is for calculating the total price of badminton fees.</h6>
          
          <div class="row">
            <div class="col s6 m6">
              <h5>Recent Matches</h5>
            </div>
            <div class="col s6 m6" style="margin-top : 10px">
              {{-- <a href="{{route('events.create')}}"><button class="right waves-effect waves-light btn">New Event</button></a> --}}

              {{-- Modal Trigger --}}
                        <button data-target="modal1" class="btn right modal-trigger">New Event</button>
                        <a href="{{route('events.index')}}"><button class="right waves-effect waves-light btn blue darken-1" style="margin-right : 10px">View All Event</button></a>
                        

                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <form action="{{route('events.store')}}" method="post">

                                {{ csrf_field() }}
                            <div class="modal-content">
                            <h4>Add A New Event</h4>
                            
                                <div class="row">
                                
                                    <div class="input-field col s12">

                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="name" name="name" type="text" class="validate">
                                        <label for="name">Event Name</label>

                                    </div>

                                    <div class="input-field col s12">

                                        <i class="material-icons prefix">account_balance</i>
                                        <input id="hall" name="hall" type="text" class="validate">
                                        <label for="hall">Hall Price (RM)</label>

                                    </div>

                                    <div class="input-field col s12">

                                        <i class="material-icons prefix">attach_money</i>
                                        <input id="shuttlecockfees" name="shuttlecockfees" type="text" class="validate">
                                        <label for="shuttlecockfees">Shuttlecock/Person (RM)</label>

                                    </div>

                                    <div class="input-field col s12">

                                        <i class="material-icons prefix">add_location</i>
                                        <input id="location" name="location" type="text" class="validate">
                                        <label for="location">Location</label>

                                    </div>
                                    

                                    <div class="input-field col s12">

                                        <i class="material-icons prefix">date_range</i>
                                        <input id="dateEvent" name="dateEvent" type="text" class="datepicker validate">
                                        <label for="dateEvent">Date</label>

                                    </div>

                                    <div class="input-field col s12">

                                        <i class="material-icons prefix">access_alarm</i>
                                        <input id="timeEvent" name="timeEvent" type="text" class="timepicker validate">
                                        <label for="timeEvent">Time</label>

                                    </div>
                                    
                                

                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn waves-effect waves-light red accent-4">Reset Form</button>
                                <button type="submit" class="btn waves-effect waves-light">Create Event</button>
                               
                            </div>

                             </form>

                        </div>

            </div>
            
          </div>

        @if($events->count())
          <table class="highlight">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                </tr>
              </thead>
          @foreach($events as $event)
              <tbody>
              <tr onclick="window.location='http://shuttlecalculator.test/events/'+{{$event->id}}" style="cursor:pointer;">
                  <td>{{$event->name}}</td>
                  <td>{{$event->place}}</td>
                  <td>{{$event->created_at}}</td>
                  <td>{{$event->updated_at}}</td>
                </tr>
              </tbody>
          @endforeach

          </table>
            
          @else
            <h6>No event yet! :( Please add an event</h6>
          @endif

        </div>

      </card>

    </div>  
@endsection


@section('script')
    <script>
      
      // Modal Initialization
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });

     //Create event initialization for datepicker and timepicker
    var dateToday = new Date();

        //Date picker JS

        $(document).ready(function(){
            $('.datepicker').datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                format: 'd mmmm yyyy',
                numberOfMonths: 3,
                minDate: dateToday,
            });
            
        });

        //Time picker JS
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.timepicker');
            var options = {
                twelveHour: false,
                formatSubmit: "H:i:00",
            };
            var instances = M.Timepicker.init(elems, options);
        });

      
    </script>
@endsection