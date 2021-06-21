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
	<div style="text-align: center;">

		<h3>{{ $user->username }}</h3>
		<img width="auto" height="500" src="{{ asset($user->username.'-images/'.$post->photo) }}">

		@if(sizeof(App\Like::where('user_id', Auth()->user()->id)->where('post_id', $post->id)->get()) == 0)
		<a href="{{ route('like',['post_id'=>$post->id]) }}"><img style="margin-left: 5px" width="23px" height="23px" src="{{ asset('images/like.png') }}"></a>
		@else
		<a href="{{ route('dislike',['post_id'=>$post->id]) }}"><img style="margin-left: 5px" width="35px" height="35px" src="{{ asset('images/like_red.png') }}"></a>
		@endif

		<p hidden>
		<?php $total_like = sizeof(App\Like::where('post_id', $post->id)->get());

		?>
		@if($total_like == 0)
			<p>Be the first who like</p>

		@elseif($total_like == 1)
		<?php	$user_id_who_liked = App\Like::where('post_id', $post->id)->latest('created_at')->firstOrfail()->user_id;
		 		$username_who_liked = App\User::where('id', $user_id_who_liked)->firstOrFail()->username; ?>
			<p>Liked by <a href="{{ route('profile', ['username'=>$username_who_liked]) }}">{{ $username_who_liked }}</a></p>
		
		@elseif($total_like == 2)
		<?php	$user1 = App\Like::where('post_id', $post->id)->orderBy('created_at', 'desc')->firstOrFail()->user_id;
				$user2 = App\Like::where('post_id', $post->id)->orderBy('created_at', 'asc')->firstOrFail()->user_id;
		?>
		</p>
		<?php	$user1_username = DB::table('users')->where('id', $user1)->first()->username;
				$user2_username = DB::table('users')->where('id', $user2)->first()->username;

		?>
		 	<p>Liked by <a href="{{ route('profile', ['username'=>$user1_username]) }}">{{ $user1_username }}</a> and <a href="{{ route('profile', ['username'=>$user2_username]) }}">{{ $user2_username }}</a></p>

		@else
		<?php	$user_id_who_liked = App\Like::where('post_id', $post->id)->latest('created_at')->firstOrfail()->user_id;
				$user_username = DB::table('users')->where('id', $user_id_who_liked)->first()->username;
				$likes = App\Like::where('post_id', $post->id)->get();
		?>
		<p>Liked by <a href="{{ route('profile', ['username'=>$user_username]) }}">{{ $user_username }}</a> and <a data-toggle="modal" data-target="#peopleWhoLikePost">{{ $total_like - 1 }} others</a></p>

		{{-- LIKES MODAL --}}
		<div style="margin-top: 200px;" class="modal fade" id="peopleWhoLikePost" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
          				<h4 style="margin-left: 208px" class="modal-title">Likes</h4>
        			</div>
					<div class="modal-body" style="text-align: center;">
						@foreach($likes as $l)
							<a href="{{ route('profile', ['username'=>App\User::where('id', $l->user_id)->firstOrFail()->username]) }}"><p>{{ App\User::where('id', $l->user_id)->firstOrFail()->username }}</p></a>
						@endforeach
					</div>
				</div>
            </div>
        </div>

		@endif

		<h3>{{ $post->description }}</h3>

		<form method="POST" action="{{ route('store_comment') }}">
			@csrf
	  			<?php $avatar = App\User::where('id', Auth()->user()->id)->firstOrfail()->avatar ?>
	  		<input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
	  		<input type="hidden" name="post_id" value="{{ $post->id }}">
	  		<img style="border-radius: 50%" width="30px" height="30px" src="{{ asset('images/'.$avatar) }}" class="cover-img">
	  		<input class="comment-input text-gray arial font-size-14" name="comment" placeholder="დაწერე კომენტარი">
	  		<br>
   			<button type="submit" class="btn btn-secondary rounded-38 arial font-size-14 text-gray comment-btn mt-3" title="დამატება">დამატება</button>

		</form>

		@foreach(App\Comment::where('post_id', $post->id)->get() as $comment)
			<?php 

			$avatar = App\User::where('id', $comment->user_id)->firstOrfail()->avatar;
			$username = App\User::where('id', $comment->user_id)->firstOrfail()->username;

			?>
			<div class="comment-user">
				<a href="{{ route('profile', ['username'=>$username]) }}">
					<img style="border-radius: 50%; margin: 10px" width="30px" height="30px" src="{{ asset('images/'.$avatar) }}">
				</a>
			</div>
			<p class="text-gray text-break CommentText" data-id="738">{{ $comment->comment }}</p>
			<div class="clearfix"></div>
			
			<div class="wrapp_subcommnet"></div>
			@endforeach

	</div>
@endsection