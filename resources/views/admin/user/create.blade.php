<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data" class="container">
                        @csrf
                        <div class="row">
                            <div class="col-3">            
                                <div><!-- Name -->
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Email Address -->
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Password -->
                                    <x-label for="password" :value="__('Password')" />
                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- nick_name -->
                                    <x-label for="nick_name" :value="__('Apelido')" />
                                    <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="old('nick_name')" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div><!-- cell  -->
                                    <x-label for="cell" :value="__('Número')" />
                                    <x-input id="cell" class="block mt-1 w-full" type="text" name="cell" :value="old('cell')" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Year  -->
                                    <x-label for="year" :value="__('Idade')" />
                                    <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Job  -->
                                    <x-label for="job" :value="__('Trabalha com?')" />
                                    <x-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Livin_in  -->
                                    <x-label for="livin_in" :value="__('Mora em')" />
                                    <x-input id="livin_in" class="block mt-1 w-full" type="text" name="livin_in" :value="old('livin_in')" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div><!-- Gender_id -->
                                    <x-label for="gender_id" :value="__('Gênero')" />
                                    <select name="gender_id" id="gender_id" class="block mt-1 w-full" required>
                                        <option value="0" selected disabled>Selecione</option>
                                        @foreach($genders as $gender)    
                                            <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- sexual_orietation_id  -->
                                    <x-label for="sexual_orientation_id" :value="__('Orientação Sexual')" />
                                    <select name="sexual_orientation_id" id="sexual_orientation_id" class="block mt-1 w-full" required>
                                        <option value="0" selected disabled>Selecione</option>
                                        @foreach($sexualOrientations as $sexualOrientation)    
                                            <option value="{{ $sexualOrientation['id'] }}">{{ $sexualOrientation['name'] }}</option>
                                        @endforeach            
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Smoking_id -->
                                    <x-label for="smoking_id" :value="__('Fuma?')" />
                                    <select name="smoking_id" id="smoking_id" class="block mt-1 w-full" required>
                                        <option value="0" selected disabled>Selecione</option>
                                        @foreach($smokings as $smoking)    
                                            <option value="{{ $smoking['id'] }}">{{ $smoking['name'] }}</option>
                                        @endforeach            
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- admin -->
                                    <x-label for="admin" :value="__('ADMIN')" />
                                    <select name="admin" id="admin" class="block mt-1 w-full" required>
                                        <option value="0" selected >Não</option>
                                        <option value="1"> Sim</option>        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-8"><!-- description -->
                                <x-label for="description" :value="__('Descrição')" />
                                <textarea id="description" cols="10" rows="5" class="block mt-1 w-full" name="description"  id="description" :value="old('description')" required></textarea>
                            </div>
                            <div class="col-4" style="margin-top:108px"><!-- photo -->
                                <x-label for="photo" :value="__('Foto')" />
                                <x-input class="block mt-1 w-full" type="file" id="photo" name="photo" :value="old('photo')" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-4 mb-2"><!-- Filtro -->
                                <x-label for="filter_id"  :value="__('Filtro')" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div><!-- sexual_orietation_id  -->
                                    <x-label for="sexual_orientation" :value="__('Orientação Sexual')" />
                                    <select name="sexual_orientation" id="sexual_orientation" class="block mt-1 w-full" required>
                                        <option value="0" selected disabled>Selecione</option>
                                        @foreach($sexualOrientations as $sexualOrientation)    
                                            <option value="{{ $sexualOrientation['id'] }}">{{ $sexualOrientation['name'] }}</option>
                                        @endforeach            
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Gender_id -->
                                    <x-label for="gender" :value="__('Gênero')" />
                                    <select name="gender" id="gender" class="block mt-1 w-full" required>
                                        <option value="0" selected disabled>Selecione</option>
                                        @foreach($genders as $gender)    
                                            <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Smoking_id -->
                                    <x-label for="smokings" :value="__('Fuma?')" />
                                    <select name="smokings" id="smokings" class="block mt-1 w-full" required>
                                        <option value="0" selected disabled>Selecione</option>
                                        @foreach($smokings as $smoking)    
                                            <option value="{{ $smoking['id'] }}">{{ $smoking['name'] }}</option>
                                        @endforeach            
                                    </select>
                                </div>
                            </div>
                            <div class="col-1">
                                <div><!-- year_min -->
                                    <x-label for="year_min" :value="__('Idade Mín')" />
                                    <x-input id="year_min" class="block mt-1 w-full" type="number" name="year_min" :value="old('year_min')" required />
                                </div>
                            </div>
                            <div class="col-1">
                                <div><!-- year_max -->
                                    <x-label for="year_max" :value="__('Idade Máx')" />
                                    <x-input id="year_max" class="block mt-1 w-full" type="number" name="year_max" :value="old('year_max')" required />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-primary ml-4">Voltar</a>
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
