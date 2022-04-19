<?php
use App\Models\WarehouseFlower;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warehouses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('go-to-add-stock', $warehouse->id) }}" class="text-sm text-blue-600 hover:text-blue-500">
                        {{ __('Add flower to this warehouse') }}
                    </a>
                    <?php
                    $amount = 0;
                    $stocks = WarehouseFlower::where('warehouse_id', $warehouse->id)->get();
                    foreach ($stocks as $stock) {
                        $amount += $stock->amount;
                    }
                    ?>
                    <h1>Aantal bloemen in dit magazijn: {{ $amount }}</h1>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('Image') }}</th>
                            <th class="px-4 py-2">{{ __('Flower') }}</th>
                            <th class="px-4 py-2">{{ __('Amount') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($stocks as $stock)
                            <tr>
                                <td class="px-4 py-2"><img width="50px" height="50px" src="{{ asset('img/flowers/' . $stock->flower->img) }}" alt="Flower"></td>
                                <td class="text-center">{{ $stock->flower->name }}</td>
                                <td class="text-center">{{ $stock->amount }}</td>
                                <td class="text-center"><a href="{{ route('warehouseFlowers.edit', $stock->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
