@extends('layouts.app')

@section('header-section')
<div style="margin: 5px; margin-left: 500px; margin-top: 8px" >
    <a class="header" href="{{ route('home') }}" ><img width="30px" height="30px" src="{{ asset('images/home.png') }}"></a>

    <a class="header" href="{{ route('inbox') }}" ><img width="30px" height="30px" src="{{ asset('images/inbox.png') }}"></a>

    <a class="header" href="{{ route('explore') }}" ><img width="30px" height="30px" src="{{ asset('images/explore.png') }}"></a>

    <a class="header" href="{{ route('heart') }}" ><img width="30px" height="30px" src="{{ asset('images/heart.png') }}"></a>

</div>
@endsection

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="width: 100%; overflow: hidden;">
                        
                        <div style="width: 200px; float: left;">
                            <a id="navbarDropdown" class="nav-link" style="margin-right: 72px" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img style="border-radius: 50%" width="150px" height="150px" src="{{ asset('images'."/".$avatar) }}">
                            </a>
                            @if($username == Auth()->user()->username)

                            <div class="dropdown-menu dropdown-menu" style="margin-right: 18px; text-align: center;" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item">
                                        <button type="button" style="width: 150px" class="btn btn-default-border-blk" data-toggle="modal" data-target="#avatarUpdate">Set New Avatar</button>

                                    </a>
                                    <a class="dropdown-item">
                                        <button type="button" style="width: 150px" class="btn btn-default-border-blk" data-toggle="modal" data-target="#avatarRemove">Remove Avatar</button>
                                    </a>
                            </div>
                            @endif


                        </div>

                    {{-- AVATAR UPDATE MODAL --}}
                    <form method="POST" action="{{ route('avatar') }}" enctype="multipart/form-data">
                        @csrf
                        <div style="margin-top: 200px;" class="modal fade" id="avatarUpdate" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body" style="text-align: center;">
                                        <h3>Upload Avatar</h3>
                                        <br>
                                        <input type="file" name="avatar">
                                        <br>
                                        <button class="btn btn-default-border-blk" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- AVATAR REMOVE MODAL --}}
                    <form method="POST" action="{{ route('avatar_remove',['id'=>Auth()->user()->id]) }}">
                        @csrf
                        <div style="margin-top: 200px;" class="modal fade" id="avatarRemove" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body" style="text-align: center;">
                                        <h3>Remove Current Avatar</h3>
                                        <button class="btn btn-danger" type="submit">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                        <div style="margin-left: 200px; margin-top: 20px">
                            <ul>
                                <h3><b>{{ $user->username }}</b></h3>
                        	   <li>
                        		  <b>Full Name: </b>{{ $user->fullname }}
                        	   </li>	
                        	   <li>
                        		  <b>Username: </b>{{ $user->username }}
                        	   </li>
                        	   <li>
                        		  <b>E-mail: </b>{{ $user->email }}
                        	   </li>
                            </ul>
                            <div style="margin-left: 30px; margin-bottom: 5px">    
                                @if($username == Auth()->user()->username)
                                <button type="button" style="width: 150px" class="btn btn-default-border-blk" data-toggle="modal" data-target="#uploadPhoto">Upload Photo</button>
                                @endif
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

            {{-- PHOTO UPLOAD MODAL --}}
            <form method="POST" action="{{ route('upload_photo') }}" enctype="multipart/form-data">
                @csrf
                <div style="margin-top: 200px;" class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body" style="text-align: center;">
                                <h3>Upload Photo</h3>
                                <input type="file" name="photo">
                                <br>
                                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                                <label for="description"><b>Description</b></label>
                                <br>
                                <textarea id="description" name="description"></textarea>
                                <br>
                                <button type="submit" class="btn btn-outline-dark">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @if(sizeof(App\Post::where('user_id', $user->id)->get()) == 0)
            <div style="text-align: center; margin-top: 120px">
                <img src="{{ asset('images/nophoto.png') }}" height="70px" width="70px">
                <h2 style="margin-top: 20px">No Posts Yet</h2>
            </div>
            @endif

            <div class="row">
                @foreach(App\Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get() as $post)
                <div class="column">
                    <a href="{{ route('single_post', ['username'=>$username, 'id'=>$post->id]) }}">
                        <div class="hover12">
                            <figure>
                                <img width="300" height="300" src="{{ asset($username."-images/".$post->photo) }}" style="width:100%">
                                <div class="overlayTst">
                                    <div class="text">
                                        <p>Gela gigia</p>
                                        <img width="20px" height="20px" src="{{ asset('images/heart_black.png') }}">
                                    </div>
                                </div>

                            </figure>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
