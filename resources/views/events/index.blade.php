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
                        <a href="{{route('events.create')}}"><button class="right waves-effect waves-light btn" style="margin-top:40px">New Event</button></a>
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

                             <a href="{{route('events.show',$event->id)}}"><button class="waves-effect waves-teal btn blue-grey lighten-3">View</button></a> 
                            
                                                       
                        </td>
                        <td>
                            {!! Form::open(['action' => ['EventController@destroy',$event->id],'method' => 'DELETE','onsubmit' => 'return confirmBox();']) !!}                            
                                {!! Form::submit('Delete',['class' => 'btn waves-effect waves-light']); !!}
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

    </script>

@endsection