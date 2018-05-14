@extends('layouts.master')

@section('title')
    Create a new match
@endsection


@section('content')

    <div class="container" id="app">

        <card size="col s12 m12" color="" text="black-text" style="padding-top:15px;">

        <div slot="title"><h3>Edit an Event</h3></div>            

            <div slot="body">

                <div class="row">
                                
                    {!! Form::model($event,['action' => ['EventController@update',$event->id],'method' => 'PATCH']) !!}

                    <div class="input-field col s12">

                        <i class="material-icons prefix">account_circle</i>
                        {!! Form::text('name', null, ['class' => 'validate']); !!}
                        {!! Form::label('name', 'Event Name'); !!}

                    </div>   
                    
                    <div class="input-field col s12">

                        <i class="material-icons prefix">add_location</i>
                        {!! Form::text('place', null, ['class' => 'validate']); !!}
                        {!! Form::label('location', 'Event Location'); !!}

                    </div>    

                    <div class="input-field col s12">                    

                        <i class="material-icons prefix">date_range</i>
                        {!! Form::text('dateEvent', null, ['class' => 'datepicker validate']); !!}
                        {!! Form::label('dateEvent', 'Date'); !!}
                    </div>   

                    <div class="input-field col s12">                    

                        <i class="material-icons prefix">access_alarm</i>
                        {!! Form::text('timeEvent', null ,['class' => 'timepicker validate']); !!}
                        {!! Form::label('timeEvent', 'Time '); !!}

                    </div>
                    
                    <div class="row">
                        <div class="col s12">
                            <div class="center-align">
                                {!! Form::submit('Create Event',['class' => 'btn waves-effect waves-light']); !!}
                                {!! Form::reset('Clear Form',['class' => 'btn waves-effect waves-light red darken-2','step' => '1']); !!}
                            </div>
                        </div>
                    </div>
    
                    {!! Form::close() !!}
                    
                </div>

            </div>

        </card>

    </div>

@endsection

@section('script')

    <script>
    
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