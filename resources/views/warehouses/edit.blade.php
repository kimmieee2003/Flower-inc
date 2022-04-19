<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warehouse ') }} {{ $warehouse->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('warehouses.update', $warehouse->id) }}" class="flex flex-col">
                        @csrf
                        @method('PUT')

                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $warehouse->name }}" placeholder="{{ $warehouse->name }}">

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="{{ $warehouse->address }}" placeholder="{{ $warehouse->address }}">

                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
