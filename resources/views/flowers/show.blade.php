<?php
use App\Models\WarehouseFlower;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flowers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('flowers.create') }}" class="text-sm text-blue-600 hover:text-blue-500">
                        {{ __('Create new Flower') }}
                    </a>
                    <table class="table-auto w-full">
                        <thead>
                        <?php
                        $amount = 0;
                        $stocks = WarehouseFlower::where('flower_id', $id)->get();
                        foreach ($stocks as $stock) {
                            $amount += $stock->amount;
                        }
                        ?>
                        <h1>Aantal flowers van dit model in alle warehouses: {{ $amount }}</h1>
                        <tr>
                            <th class="px-4 py-2">{{ __('Name') }}</th>
                            <th class="px-4 py-2">{{ __('Address') }}</th>
                            <th class="px-4 py-2">{{ __('Amount of this flower in all warehouses') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($warehouses as $warehouse)

                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $warehouse->warehouse->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $warehouse->warehouse->address }}</td>
                                <td class="border px-4 py-2 text-center">{{ $warehouse->amount }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
