<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flower ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('flowers.store') }}" class="flex flex-col" enctype="multipart/form-data">
                        @csrf

                        <label for="name">Name</label>
                        <input type="text" id="name" name="name">

                        <label for="image">Image</label>
                        <input type="file" id="image" name="image">


                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
