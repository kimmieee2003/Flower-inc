<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-popup-feedback />
                    <form action="{{ route('change-password') }}" method="post" class="flex flex-col">
                        @csrf

                        <label for="password">Nieuw wachtwoord</label>
                        <input type="password" id="password" name="password">

                        <label for="password-confirm">Confirm wachtwoord</label>
                        <input type="password" id="password-confirm" name="password_confirmation">

                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
