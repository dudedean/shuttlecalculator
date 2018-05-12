@extends('layouts.master')

@section('title')
    Events
@endsection

@section('content')

    <div class="container" id="app">

        <card size="col s12 m12" color="" text="black-text" style="padding-top:15px;">

            <div slot="title">
                <div class="row">
                    <div class="col s6 m6">
                        <h3>All Matches</h3>
                    </div>
                    <div class="col s6 m6">

                        {{-- Modal Trigger --}}
                        <button data-target="modal1" class="btn right modal-trigger" style="margin-top:40px">New Event</button>

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
                    {!! Form::close() !!}
                            
                        </div>

                    </div>
                </div>
            
            </div>


            <br>

            <div slot="body">

                @if($events->count())
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Event Location</th>
                            <th>Date & Time</th>
                            <th>Time</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                @foreach($events as $event)
                    <tbody>
                        <tr>
                        <td>{{$event->name}}</td>
                        <td>{{$event->place}}</td>
                        <td>{{$event->dateEvent}}</td>
                        <td>{{$event->timeEvent}}</td>
                        <td>

                             <a href="{{route('events.show',$event->id)}}"><button class="waves-effect waves-teal btn blue darken-1">View</button></a> 
                            
                                                       
                        </td>
                        <td>
                            {!! Form::open(['action' => ['EventController@destroy',$event->id],'method' => 'DELETE','onsubmit' => 'return confirmBox();']) !!}                            
                                {!! Form::submit('Delete',['class' => 'btn waves-effect waves-light white-text red accent-4']); !!}
                            {!! Form::close() !!}
                        </td>
                        </tr>
                    </tbody>
                @endforeach

                </table>

                {{$events->links()}}
            
                @else
                    <h6>No event yet! :( Please add an event</h6>
                @endif
        
            </div>

        </card>

    </div>



@endsection

@section('script')
    
    <script>

    function confirmBox(){
        var answer = confirm('Are you sure to delete this?');
        if(answer == true){
            return true;
        }
        else{
            return false;
        }
    }

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