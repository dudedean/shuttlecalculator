@extends('layouts.master')

@section('content')

    <div class="container" id="app">

        <card size="col s12 m12" color="" text="black-text" style="padding-top:15px;">

            <h3 slot="title"><b>{{$event->name}}</b></h3>

            <br>
            
            <div slot="body">

                <br>

                <div class="row">
                    <div class="col s3 m3">
                        <b>Location</b>
                    </div>
                    <div class="col s6 m6">
                        <p>{{$event->place}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col s3 m3">
                        <b>Date</b>
                    </div>
                    <div class="col s6 m6">
                        <p>{{$event->dateEvent}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col s3 m3">
                        <b>Time</b>
                        
                    </div>
                    <div class="col s6 m6">
                        <p>{{$event->timeEvent}}</p>

                    </div>
                </div>
                
                <div class="row">
                    <div class="col s5 m6">
                        <a href="{{route('events.edit',$event->id)}}"><button class="btn waves-effect waves-light deep-orange lighten-1 right">Edit Event Details</button></a>
                    </div>
                    <div class="col s6 m6">
                        {!! Form::open(['action' => ['EventController@destroy',$event->id],'method' => 'DELETE','onsubmit' => 'return confirmBox();']) !!}                            
                                {!! Form::submit('Delete Event',['class' => 'btn waves-effect waves-light white-text red accent-4']); !!}
                        {!! Form::close() !!}
                    </div>
                </div>

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