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
                    <div class="card-header">
                        <div class="float-start">
                            <h5>List : {{ $count }}</h5>
                        </div>
                        <div class="float-end">
                            <button type="button" class="btn btn-primary btn-sm" id="bt_add"
                                onclick="window.location='/admin/event/create';">
                                Add
                                <span class="fas fa-plus" aria-hidden="true">
                                </span>
                            </button>
                        </div>
                        <div class="float-none"></div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 1;
                                @endphp
                                @foreach($events as $event)
                                    <tr event_id="{{$event->id}}">
                                        <td class="text-center">{{$x}}</td>
                                        <td class="text-left">{{$event->name}}</td>
                                        <td class="text-center">{{($event->start_date ? date('d/m/Y', strtotime($event->start_date)) : '-')}}</td>
                                        <td class="text-center">{{($event->end_date ? date('d/m/Y', strtotime($event->end_date)) : '-')}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" href="/admin/event/{{$event->id}}/edit">
                                                Edt
                                                <span aria-hidden="true" class="fas fa-list-alt"></span>
                                            </a>
                                            <a class="btn btn-danger btn-sm" del obj_id="{{$event->id}}">
                                                Del
                                                <span class="fas fa-trash-alt" aria-hidden="true" ></span>
                                            </a>
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
