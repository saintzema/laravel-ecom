<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Users</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="my-20 mx-10">
<a href="{{url("/")}}"><img class="h-20" src={{asset("./logo.png")}}></a>

@if (session(('success')))
<div class="px-6 py-2 bg-green-100 border-green-600 rounded-sm border-2">
    <span class="text-sm text-green-300">
            {{session('success')}}
    </span>
</div>
@endif

<div class="relative overflow-x-auto shadow-md sm:rounded-lg my-50 py-30">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 my-50">
        <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3">
                    Updated At
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="px-6 py-3">
                    Update
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $user->name}}                </th>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4">
                    {{$user->created_at->diffForHumans()}}
                </td>
                <td class="px-6 py-4">
                   {{$user->updated_at->diffForHumans()}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('deleted_user', $user->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                </td>
                <td>
                    <a href="{{route('edit_user', $user->id)}}" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>

            @endforeach
        </tbody>

    </table>
</div>


</body>
</html>
