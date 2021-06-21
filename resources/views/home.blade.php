@extends('layouts.app')

@section('header-section')
<div style="margin: 5px; margin-left: 500px; margin-top: 8px" >
    <a class="header" href="{{ route('home') }}" ><img width="30px" height="30px" src="{{ asset('images/home_black.png') }}"></a>

    <a class="header" href="{{ route('inbox') }}" ><img width="30px" height="30px" src="{{ asset('images/inbox.png') }}"></a>

    <a class="header" href="{{ route('explore') }}" ><img width="30px" height="30px" src="{{ asset('images/explore.png') }}"></a>

    <a class="header" href="{{ route('heart') }}" ><img width="30px" height="30px" src="{{ asset('images/heart.png') }}"></a>

</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
