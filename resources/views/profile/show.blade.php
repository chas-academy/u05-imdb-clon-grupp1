{{$user->name}}
{{$user->profile->title}}
@can('update', $user->profile)
<a href="/profile/{{$user->profile->id}}/edit">Edit Profile</a>
@endcan