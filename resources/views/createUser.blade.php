@extends('index')

@section('title')
    Create user
@endsection

@section('content')
<div class="border p-10 rounded-xl w-1/2">
    @if(session(('success')))
    <div class="border-2 rounded-md border-green-600 px-4 py-2 bg-green-100">
        <span class="text-sm text-green-500">
            {{session('success')}}
        </span>
    </div>
    @endif
    <h2 class="text-xl">Create new user form</h2>

    <form method="POST" action="{{route("store.user.data")}}" class="space-y-4 mt-3">
        @csrf
        <div class="text-">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{old ("name")}}" class="bg-gray-50 p-2 border rounded-md w-full" placeholder="Enter name" />
            @error('name')
                <span class="text-red-500 text-s"><small><i>{{$message}}</i></small></span>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" class="bg-gray-50 p-2 border rounded-md w-full" placeholder="Enter email" />
        </div>
        @error('email')
        <span class="text-red-500 text-s"><small><i>{{$message}}</i></small></span>
    @enderror
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" class="bg-gray-50 p-2 border rounded-md w-full" placeholder="*******" />
            @error('password')
                                <span class="text-red-500 text-xs"> <small><i> {{ $message }}</i></small></span>

            @enderror
        </div>

        <button type="submit" class="bg-orange-200 px-5 py-2 rounded-md hover:bg-orange-300 transition-all ease-in-out">submit</button>
    </form>
</div>
@endsection
