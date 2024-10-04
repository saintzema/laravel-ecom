<x-layout>
    <x-slot:heading>
Register   
 </x-slot:heading>
<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base leading-7 text-gray-900 font-bold">Create A New Job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">We just need a few details to get started.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for='title'>Job Title </x-form-label>
                <div class="mt-2">
           <x-form-input name='title' id="title" placeholder="CEO"/>
            <x-form-error name='title'/>
            </div>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
              <label for="salary" class="block text-sm font-bold leading-6 text-gray-900">Salary</label>
              <div class="mt-2">
                <x-form-input name='title' id='title' aria-placeholder="CEO" required/>
                @error('salary')
                <p class="text-xs text-red-500 font-semibold  font-italics mt-1">{{$message}}</p>
              @enderror
                <div>
                  <textarea class="my-6 w-200" name="description" placeholder="Job Description" ></textarea> <!-- Ensure this field exists -->
                </div>
              <div class="my-6">
                <input type="text" name="company" placeholder="Company Name" required> <!-- Ensure this field exists -->
              </div>
                <div>
                    <div class="mt-2">
                        <div class="flex rounded-md px-3 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                          <input type="text" name="company" id="company" autocomplete="company" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Enter company name">
                        </div>
                        <div>
                  <select class="my-6" name="employer_id" required>
                    @foreach($employers as $employer)
                        <option value="{{ $employer->id }}">{{ $employer->company }}</option>
                    @endforeach
                </select>
            </div>
                </div>
                </div>
              </div>
            </x-form-field>


      </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <x-form-button>Create Job</x-form-button>
    </div>
  </form>


</x-layout>
