<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('profile.update', $oUser[0]['id']) }}" enctype="multipart/form-data" class="container justify-content-center">
                        @csrf
                        @method('put')
                        <div class="row">
                            <x-label :value="__('Filtro')" class="mb-3" />
                            <div class="col-3">
                                <x-label for="sexual_orientation" :value="__('Orientação Sexual')" />
                                <select name="sexual_orientation" class="block mt-1 w-full">
                                    @foreach ($sexualOrietations as $sexualOrietation)
                                        <option value="{{ $sexualOrietation['id'] }}" {{ $sexualOrietation['id'] == $oUser[0]['sexual_orientation'] ? "selected" : ""}}> {{ $sexualOrietation['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <x-label for="gender" :value="__('Genero')" />
                                <select name="gender" class="block mt-1 w-full">
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender['id'] }}" {{ $gender['id'] == $oUser[0]['gender'] ? "selected" : ""}}> {{ $gender['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <x-label for="smokings" :value="__('Fuma?')" />
                                <select name="smokings" class="block mt-1 w-full">
                                    @foreach ($smokings as $smoking)
                                    <option value="{{ $smoking['id'] }}" {{ $smoking['id'] == $oUser[0]['smoking_id'] ? "selected" : ""}}> {{ $smoking['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1">
                                <x-label for="year_min" :value="__('Idade min')" />
                                <x-input id="year_min" class="block mt-1 w-full" type="number" name="year_min"  value="{{ $oUser[0]['filters']['year_min'] }}" />
                            </div>
                            <div class="col-1">
                                <x-label for="year_max" :value="__('Idade max')" />
                                <x-input id="year_max" class="block mt-1 w-full" type="number" name="year_max" value="{{ $oUser[0]['filters']['year_max'] }}" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <x-label :value="__('Perfil')" class="mb-3" />
                            <div class="col-4">            
                                <div><!-- Name -->
                                    <x-label for="name" :value="__('Nome')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{ $oUser[0]['name'] }}" required autofocus />
                                </div>
                            </div>
                            <div class="col-4">            
                                <div><!-- Email -->
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" value="{{ $oUser[0]['email'] }}" required autofocus />
                                </div>
                            </div>
                            <div class="col-4">            
                                <div><!-- nick_name -->
                                    <x-label for="nick_name" :value="__('Apelido')" />
                                    <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="old('nick_name')" value="{{ $oUser[0]['nick_name'] }}" required autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">            
                                <div><!-- cell -->
                                    <x-label for="cell" :value="__('Número')" />
                                    <x-input id="cell" class="block mt-1 w-full" type="text" name="cell" :value="old('cell')" value="{{ $oUser[0]['cell'] }}" required autofocus />
                                </div>
                            </div>
                            <div class="col-4">
                                <div><!-- year -->
                                    <x-label for="year" :value="__('Idade')" />
                                    <x-input id="year" class="block mt-1 w-full" type="number" name="year" :value="old('year')" value="{{ $oUser[0]['year'] }}" required autofocus />
                                </div>
                            </div>
                            <div class="col-4">
                                <div><!-- job -->
                                    <x-label for="job" :value="__('Trabalho')" />
                                    <x-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')" value="{{ $oUser[0]['job'] }}" required autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <div><!-- livin_in -->
                                    <x-label for="livin_in" :value="__('Mora em:')" />
                                    <x-input id="livin_in" class="block mt-1 w-full" type="text" name="livin_in" :value="old('livin_in')" value="{{ $oUser[0]['livin_in'] }}" required autofocus />
                                </div>
                            </div>
                            <div class="col-4">
                                <div><!-- gender_id -->
                                    <x-label for="gender_id" :value="__('Genero')" />
                                    <select name="gender_id" class="block mt-1 w-full">
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender['id'] }}" {{ $gender['id'] == $oUser[0]['gender_id'] ? "selected" : ""}}> {{ $gender['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div><!-- sexual_orientation_id -->
                                    <x-label for="sexual_orientation_id" :value="__('Orientação Sexual')" />
                                    <select name="sexual_orientation_id" class="block mt-1 w-full">
                                        @foreach ($sexualOrietations as $sexualOrietation)
                                            <option value="{{ $sexualOrietation['id'] }}" {{ $sexualOrietation['id'] == $oUser[0]['sexual_orientation_id'] ? "selected" : ""}}> {{ $sexualOrietation['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <div><!-- smoking_id -->
                                    <x-label for="smoking_id" :value="__('Fuma?')" />
                                    <select name="smoking_id" class="block mt-1 w-full">
                                        @foreach ($smokings as $smoking)
                                            <option value="{{ $smoking['id'] }}" {{ $smoking['id'] == $oUser[0]['smoking_id'] ? "selected" : ""}}> {{ $smoking['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div><!-- photo -->
                                    <x-label for="photo" :value="__('Foto')" />
                                    <x-input class="block mt-1 w-full" type="file" name="photo" />
                                </div>
                            </div>
                            <div class="col-4">
                                <x-label for="smoking_id" :value="__('Descrição')" />
                                <textarea name="description" id="description" cols="40" rows="4">{{ $oUser[0]['description'] }}</textarea>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                            <a href="{{route('profile.index')}}" class="btn btn-primary">Voltar</a>
                            <button class="btn btn-success">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>