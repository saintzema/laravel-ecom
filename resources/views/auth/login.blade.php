<x-layout>
    <x-slot:heading>
Log In   
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
<form method="POST" action="/login">
    @csrf
    <div>
        <div>
        <h2 class="text-base leading-7 text-gray-900 font-bold">Enter your login details</h2>

        <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
                      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <x-form-label for="email" class="block text-sm font-bold leading-6 text-gray-900">Email</x-form-label>
                  <div class="mt-2">
                    <x-form-input name='email' id='email' placeholder="Enter your email" :value="old('email')" required/>
                    <x-form-error name='email'></x-form-error>
                  </div>
                
                <div class="mt-10 grid-cols1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                    <x-form-label for="confirm_password" > Password</x-form-label>
                    <x-form-input name="confirm_password" placeholder="Enter Password" required/>
                    <x-form-error name="confirm_password"></x-form-error>
                    </div>
                </div>
                </div>
                </div>
              </div>
            </x-form-field>


      </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/" class="text-sm font-semibold leading-6 text-gray-900 p-10">Cancel</button>
    <x-form-button>Login</x-form-button>
    </div>
  </form>


</x-layout>
