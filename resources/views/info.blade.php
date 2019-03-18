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
                            <li class="list-group-item text-success">Adjust Laravel Framework packages to a task</li>
                            <li class="list-group-item text-success">Add informational Component to base url</li>
                            <li class="list-group-item text-success">Wire User and Event models with Event DB seeding</li>
                            <li class="list-group-item text-success">Expend Auth controller to pass user data to Vue</li>
                            <li class="list-group-item text-success">Create an API to control data with Guards and token</li>
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
                            <li class="list-group-item text-success">Get data from Laravel and add to Calendar component</li>
                            <li class="list-group-item text-success">Create an event booking interface for Calendar component</li>
                            <li class="list-group-item active">Update calendar on every axios request</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </intro-component>
@endsection