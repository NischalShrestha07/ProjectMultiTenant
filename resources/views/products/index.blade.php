<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
            <x-btn-link class="ml-4 float-right" href="{{route('products.create')}}">Add Product</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">



                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Category</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($products as $item)

                            <tr>
                                <th scope="row">{{$i++}}</th>
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



                </div>

            </div>
        </div>
    </div>
</x-app-layout>
