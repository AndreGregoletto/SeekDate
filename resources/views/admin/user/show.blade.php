<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perfil de <em>{{ $oUser[0]->name }}</em>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row g-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/'.$oUser[0]->photo) }}" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fs-3"><em><strong>{{ $oUser[0]->name }}</strong></em></h5>
                                    <p class="card-text"><strong>Apelido:</strong> <em>{{ $oUser[0]->nick_name }}</em></p>
                                    <p class="card-text"><strong>Email:</strong> <em>{{ $oUser[0]->email }}</em></p>
                                    <p class="card-text"><strong>Contato:</strong><em> {{ $oUser[0]->cell }}</em></p>
                                    <p class="card-text"><strong>Idade: </strong><em>{{ $oUser[0]->year }}</em></p>
                                    <p class="card-text"><strong>Trabalho:</strong><em> {{ $oUser[0]->job }}</em></p>
                                    <p class="card-text"><strong>Mora em: </strong><em>{{ $oUser[0]->livin_in }}</em></p>
                                    <p class="card-text"><strong>Orientação Sexual: </strong><em>{{ $oUser[0]['sexualOrietations']->name}}</em></p>
                                    <p class="card-text"><strong>Genero: </strong><em>{{ $oUser[0]['genders']->name }}</em></p>
                                    <p class="card-text"><strong>Fuma?: </strong><em>{{ $oUser[0]['smokings']->name }}</em></p>
                                    <p class="card-text"><strong>Descrição: </strong><em>{{ $oUser[0]->description }}</em></p>
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <a href="{{ route('admin.user.index') }}" class="ml-4">
                                    <x-button class="ml-4">
                                        {{ __('Voltar') }}
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
