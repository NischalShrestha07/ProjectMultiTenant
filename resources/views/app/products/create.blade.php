<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Product Name')" />
                            <x-text-input placeholder="Name" id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="code" :value="__('Code')" />
                            <x-text-input placeholder="Code" id="code" class="block mt-1 w-full" type="text" name="code"
                                :value="old('code')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')" />
                            <x-text-input placeholder="Category" id="category" class="block mt-1 w-full" type="text"
                                name="category" :value="old('category')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="unit" :value="__('Unit')" />
                            <x-text-input placeholder="Unit" id="unit" class="block mt-1 w-full" type="text" name="unit"
                                :value="old('unit')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('unit')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input placeholder="Price" id="price" class="block mt-1 w-full" type="text"
                                name="price" :value="old('price')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            {{--
                            <x-text-input placeholder="status" id="status" class="block mt-1 w-full" type="text"
                                name="status" :value="old('status')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" /> --}}

                            <select class="form-control" name="status" id="">
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>



                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create Product') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-tenant-app-layout>