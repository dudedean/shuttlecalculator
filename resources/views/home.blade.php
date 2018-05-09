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
              <a href="{{route('events.create')}}"><button class="right waves-effect waves-light btn">New Event</button></a>
              <a href="{{route('events.index')}}"><button class="right waves-effect waves-light btn" style="margin-right : 10px">View All Event</button></a>
            </div>
            
          </div>

        @if($events->count())
          <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                </tr>
              </thead>
          @foreach($events as $event)
              <tbody>
                <tr>
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

