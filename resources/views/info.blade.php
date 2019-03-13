@extends('layouts.app')

@section('content')
    <intro-component link-url="https://github.com/VitaminasG/EventBooking" link-text="GitHub repository">
        <div slot="title">
            Event booking Application
        </div>
        <div slot="information" class="container">

            <div class="row d-flex justify-content-center">

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Back-End Task List:
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item text-success">Adjust Laravel Framework to a task</li>
                            <li class="list-group-item text-success">Add informational Component to base url</li>
                            <li class="list-group-item text-success">Wire User and Event models with Event DB-seeding</li>
                            <li class="list-group-item active">Adjust Controllers to pass a data to Vue</li>
                        </ul>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Front-End Task List:
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item text-success">Find suitable Calendar component and integrate it</li>
                            <li class="list-group-item text-success">Add informational Component to base url</li>
                            <li class="list-group-item text-success">Add ToDo list to info Component</li>
                            <li class="list-group-item active">Get data from Laravel</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </intro-component>
@endsection