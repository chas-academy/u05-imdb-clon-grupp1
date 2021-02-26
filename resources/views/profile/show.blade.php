<img src="{{$user->profile->profileImage()}}" width="100px">
{{$user->name}}
{{$user->profile->title}}
@can('update', $user->profile)
<a href="/profile/{{$user->profile->id}}/edit">Edit Profile</a>
@endcan
<h2>Watchlist</h2>
@foreach($user->profile->movies as $movie)
    {{$movie->title}}
@endforeach