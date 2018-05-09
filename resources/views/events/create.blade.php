@extends('layouts.master')

@section('title')
    Create a new match
@endsection


@section('content')

    <div class="container" id="app">

        <card size="col s12 m12" color="" text="black-text" style="padding-top:15px;">

            <h4 slot="title"><b>Create a New Match</b></h4>

            <div slot="body">

                <div class="row">
                    <form class="col s12">
                    <div class="row">

                        {{-- Full Name Input --}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="fname" name="fname" type="text" class="validate">
                            <label for="fname">Full Name</label>
                        </div>

                        {{-- Location input --}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">add_location</i>
                            <input id="location" name="location" type="text" class="validate">
                            <label for="location">Location</label>
                        </div>

                        {{-- Date input --}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">date_range</i>
                            <input id="dateEvent" name="dateEvent" type="text" class="datepicker">
                            <label for="dateEvent">Date</label>
                        </div>

                        {{-- Time input --}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">access_alarm</i>
                            <input id="timeEvent" name="timeEvent" type="text" class="timepicker">
                            <label for="timeEvent">Time</label>
                        </div>


                    </div>
                    </form>
                </div>
    
            </div>

        </card>

    </div>

@endsection

@section('script')
    
    <script>

        var dateToday = new Date();

        //Date picker JS

        $(document).ready(function(){
            $('.datepicker').datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                minDate: dateToday,
                onSelect: function(selectedDate) {
                    var option = this.id == "from" ? "minDate" : "maxDate",
                        instance = $(this).data("datepicker"),
                        date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                    dates.not(this).datepicker("option", option, date);
                }
            });
            
        });

        //Time picker JS
        $(document).ready(function(){
            $('.timepicker').timepicker();
        });
        
    </script>

@endsection