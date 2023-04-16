@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->is_admin == 1)
                        Hi .. {{ isset($name) ? $name : '' }}
                    @else
                        Hi .. Waiting for approve
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
