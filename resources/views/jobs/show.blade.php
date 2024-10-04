<x-layout>

    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h1 class="font-bold text-lg">{{$job->title}}</h1>
    <h2>This Job pays {{$job->salary}}</h2>

    <x-button class="mt-5" href="/jobs/{{$job->id}}/edit">Edit Job</x-button>

</x-layout>
