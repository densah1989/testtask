@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        Hello {{ $userName }}!
    </div>
    <div class="row">
        Please confirm your email by clicking this link: {{ $confirmedLink }}
    </div>
</div>
@endsection
