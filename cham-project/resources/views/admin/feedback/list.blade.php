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
                        </div>
                        <div class="float-none"></div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-left">Message</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 1;
                                @endphp
                                @foreach($feedbacks as $feedback)
                                    <tr event_id="{{$feedback->id}}">
                                        <td class="text-center">{{$x}}</td>
                                        <td class="text-left">{{$feedback->message}}</td>
                                        <td class="text-left">{{($feedback->name ? $feedback->name : '-')}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-sm" del obj_id="{{$feedback->id}}">
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
                            {{$feedbacks->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ URL::asset('/js/feedback_list.js') }}"></script>
@endsection
