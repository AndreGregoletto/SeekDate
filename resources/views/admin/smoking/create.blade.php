<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar nova relação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.smoking.store') }}"class="container">
                        @csrf
                        <div class="row">
                            <div class="col-9">            
                                <div><!-- Name -->
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Status -->
                                    <x-label for="status" :value="__('Status')" />
                                    <select name="status" id="status" class="block mt-1 w-full" required>
                                        <option value="0">Não</option>
                                        <option value="1" selected> Sim</option>        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.smoking.index') }}" class="btn btn-primary ml-4">Voltar</a>
                            <x-button class="ml-4">
                                {{ __('Criar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
