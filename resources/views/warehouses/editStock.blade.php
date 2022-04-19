<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warehouse ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('warehouseFlowers.update', $stock->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="flower_id">Flower</label>
                        <select name="flower_id" id="flower_id" type="text" >
                            <datalist>
                                @foreach( $flowers as $flower)
                                    @if ($flower->id == $stock->flower_id)
                                        <option value="{{ $flower->id }}" selected>{{ $flower->name }}</option>
                                    @else
                                        <option value="{{ $flower->id }}">{{ $flower->name}}</option>
                                    @endif
                                @endforeach
                            </datalist>
                        </select>

                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" value="{{ $stock->amount }}" placeholder="{{ $stock->amount }}">

                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
