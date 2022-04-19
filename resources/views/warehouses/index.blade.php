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
                    <a href="{{ route('warehouses.create') }}" class="text-sm text-blue-600 hover:text-blue-500">
                        {{ __('Create new warehouse') }}
                    </a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Name') }}</th>
                                <th class="px-4 py-2">{{ __('Address') }}</th>
                                <th class="px-4 py-2">{{ __('Total amount of flowers') }}</th>
                                <th class="px-4 py-2">{{ __('Created at') }}</th>
                                <th class="px-4 py-2" colspan="3">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warehouses as $warehouse)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $warehouse->name }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $warehouse->address }}</td>
                                    <?php
                                        $amount = 0;
                                        $stocks = WarehouseFlower::where('warehouse_id', $warehouse->id)->get();
                                        foreach ($stocks as $stock) {
                                            $amount += $stock->amount;
                                        }
                                    ?>
                                    <td class="border px-4 py-2 text-center">{{ $amount }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $warehouse->created_at }}</td>
                                    <td class="border px-4 py-2 space-x-8 flex flex-row justify-center">
                                        <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="text-blue-500 hover:text-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                        <a href="{{ route('get-stock', $warehouse->id) }}" class="text-blue-500 hover:text-blue-700">
                                            {{ __('Stock') }}
                                        </a>
{{--                                        <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" class="inline">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" class="text-red-500 hover:text-red-700">--}}
{{--                                                {{ __('Delete') }}--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
