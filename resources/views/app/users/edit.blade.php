<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input placeholder="Name" id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name',$user->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input placeholder="Email" id="email" class="block mt-1 w-full" type="email"
                                name="email" :value="old('email',$user->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="roles" :value="__('Roles')" />
                            <select multiple class="" name="roles[]" id="">
                                @foreach ($roles as $item)

                                <option value="{{$item->id}}" @if (in_array($item->
                                    id,$user->roles->pluck('id')->toArray())) selected
                                    @endif
                                    >{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-tenant-app-layout>
