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
                            <th>Update / Delete</th>
                            <th>View</th>
                        </tr>
                    </thead>
                @foreach($events as $event)
                    <tbody>
                        <tr>
                        <td>{{$event->name}}</td>
                        <td>{{$event->place}}</td>
                        <td>{{$event->created_at}}</td>
                        <td>
                            <a href=""><button class="waves-effect waves-light btn orange lighten-1" style="margin-bottom:5px">Update</button></a>
                            <a href=""><button class="waves-effect waves-light btn red darken-3">Delete</button></a>
                        </td>
                        <td>
                            <a href=""><button class="waves-effect waves-teal btn blue-grey lighten-3">View</button></a>
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