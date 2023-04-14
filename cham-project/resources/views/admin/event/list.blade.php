@extends('layouts.admin')
@section('assets')

@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Event</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 1;
                                @endphp
                                @foreach($events as $event)
                                    <tr event_id="{{$event->id}}">
                                    <td>{{$x}}</td>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->end_date}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" del a_id="{{$event->id}}">
                                        <span class="fas fa-trash-alt" aria-hidden="true" >
                                        </span>
                                        </button>
                                    </td>
                                    </tr>
                                @php
                                    $x++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div id="paging_tab" class="d-flex justify-content-center">
                            {{$events->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/event_list.js') }}"></script>
@endsection
