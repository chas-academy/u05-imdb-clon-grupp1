<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div>
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-3xl font-medium p-7 text-white">Create User</h1>
            </div>
            <form action="/admin/user" method="post" enctype="multipart/form-data">
                @csrf
                <x-label class="mt-2 mb-1">Select Role</x-label>
                <select name="role" required>
                    <option value="admin">Select Role</option>
                    <option {{old('role')=="admin"? 'selected':''}} value="admin">Admin</option>
                    <option {{old('role')=="user"? 'selected':''}} value="user">User</option>
                </select>
                <x-label for="title">Name</x-label>
                <x-input type="text" id="name" name="name" :value="old('name')" required />
                @if ($errors->has('name'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

                <x-label for="username">Username</x-label>
                <x-input type="text" id="username" name="username" :value="old('username')" required />
                @if ($errors->has('username'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif

                <x-label for="email">Email</x-label>
                <x-input type="email" id="email" name="email" :value="old('email')" required />
                @if ($errors->has('email'))
                <span class="text-red-600" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required />
                <x-button type="submit" class=" mt-3">
                    {{ __('Submit') }}
                </x-button>
            </form>
        </div>
    </x-auth-card>
</x-app-layout>