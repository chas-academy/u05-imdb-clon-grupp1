<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div>
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-3xl font-medium p-7 text-white">Edit User</h1>
            </div>
            <!--
        'name',
        'username',
        'email',
        'password',
        'role'
            -->
            <form action="/admin/user-update/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-label for="id">ID</x-label>
                <x-input name="id" value="{{$user->id}}" disabled />

                <x-label for="title">Name</x-label>
                <x-input type="text" id="name" name="name" :value="old('name') ?? $user->name" />
                @if ($errors->has('name'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

                <x-label for="username">Username</x-label>
                <x-input type="text" id="username" name="username" :value="old('username') ?? $user->username" />
                @if ($errors->has('username'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif

                <x-label for="email">Email</x-label>
                <x-input type="email" id="email" name="email" :value="old('email') ?? $user->email" />
                @if ($errors->has('email'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif

                <x-label class="mt-2 mb-1">Select Role</x-label>
                <select name="role">
                    <option {{old('role',$user->role)=="admin"? 'selected':''}} value="admin">Admin</option>
                    <option {{old('role',$user->role)=="user"? 'selected':''}} value="user">User</option>
                </select>
                <x-button type="submit" class=" mt-3">
                    {{ __('Submit') }}
                </x-button>
            </form>

            <form method="POST" action="/admin/user/{{ $user->id }}">
                @csrf
                @method('DELETE')
                {{-- <button type="submit" name="delete">Delete user</button> --}}
                <x-button type="submit" name="delete" class=" mt-3">
                    {{ __('Delete user') }}
                </x-button>
            </form>
        </div>
    </x-auth-card>
</x-app-layout>