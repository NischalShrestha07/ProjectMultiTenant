<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-link class="ml-4 float-right" href="{{route('tenants.create')}}">Add Tenant</x-btn-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}



                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Domain</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($tenants as $item)

                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                {{-- <td>{{$item->domain_name}}</td> --}}
                                <td>
                                    @foreach ($item->domains as $data)
                                    {{$data->domain}} {{$loop->last ? '':','}}

                                    @endforeach
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>



                </div>

            </div>
        </div>
    </div>
</x-tenant-app-layout>
