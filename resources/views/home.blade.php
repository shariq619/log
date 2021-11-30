@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
           <h2 class="text-center">LOG ROYALTY INSPECTION AND ASSESSMENT APPLICATION SYSTEM</h2>
            <h4 class="text-center">Logged in as {{   auth()->user()->roles->pluck('title')->first()   }}</h4>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection