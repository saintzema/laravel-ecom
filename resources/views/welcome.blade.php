<x-layout>
   <x-nav-link>
    
    </x-nav-link>
      <x-slot:heading>
    </x-slot:heading>



@extends('index')

@section('title')
    Home Page
@endsection

@section('content')
<h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl mb-10"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Welcome To</span> Zema AI.</h1>
<ul class="display-flex justify-center">
    <li class="mb-10">
        <a href="{{ url('/about') }}" class="px-4 py-3 bg-blue-500 text-white font-bold rounded-md mb-4 hover:bg-blue-200 hover:text-black font-verdana">About</a>
    </li>
    <div><li>
        <a href="{{ route('show_create_user') }}" class="px-4 py-3 bg-blue-500 text-white font-bold rounded-md mb-4 hover:bg-blue-200 hover:text-black font-verdana justify-center mx-50">Create New User</a>
    </li>
    <li class="mt-10">
        <a href="{{ route('show_create_user') }}" class="px-4 py-3 bg-blue-500 text-white font-bold rounded-md mb-4 hover:bg-blue-200 hover:text-black font-verdana justify-center mx-50 my-50 space-x-20">Sign In </a>
    </li></div>
</ul>
</x-layout>
@endsection
