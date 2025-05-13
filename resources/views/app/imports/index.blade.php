<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Products') }}
            {{-- <x-btn-link class="ml-4 float-right" href="{{route('products.create')}}">Add Product</x-btn-link> --}}
            {{-- <x-btn-link class="ml-4 float-right" href="{{route('import.index')}}">Import Products</x-btn-link> --}}
        </h2>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"># </th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Category</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp

                            @foreach ($products as $item)

                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                                    </div>
                                </th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{$item->unit}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->status}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-btn-link class="ml-4" href="{{route('imports.index')}}">Import Products
                    </x-btn-link>



                </div>

            </div>
        </div>
    </div>
</x-tenant-app-layout>