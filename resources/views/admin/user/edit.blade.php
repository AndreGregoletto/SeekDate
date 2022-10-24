<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('admin.user.update', $users[0]->id) }}" enctype="multipart/form-data" class="container">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-3">            
                                <div><!-- Name -->
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $users[0]->name }}" required autofocus />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Email Address -->
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $users[0]->email }}" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Password -->
                                    <x-label for="password" :value="__('Password')" />
                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" value="{{ $users[0]->password }}" required autocomplete="new-password" />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- nick_name -->
                                    <x-label for="nick_name" :value="__('Apelido')" />
                                    <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" value="{{ $users[0]->nick_name }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <div><!-- cell  -->
                                    <x-label for="cell" :value="__('Número')" />
                                    <x-input id="cell" class="block mt-1 w-full" type="text" name="cell" value="{{ $users[0]->cell }}" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Year  -->
                                    <x-label for="year" :value="__('Idade')" />
                                    <x-input id="year" class="block mt-1 w-full" type="text" name="year" value="{{ $users[0]->year }}" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Job  -->
                                    <x-label for="job" :value="__('Trabalha com?')" />
                                    <x-input id="job" class="block mt-1 w-full" type="text" name="job" value="{{ $users[0]->job }}" required />
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- Livin_in  -->
                                    <x-label for="livin_in" :value="__('Mora em')" />
                                    <x-input id="livin_in" class="block mt-1 w-full" type="text" name="livin_in" value="{{ $users[0]->livin_in }}" required />
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
                                            <option value="{{ $gender['id'] }}" {{ $gender['id'] == $users[0]['genders']->id ? "selected" : "" }}>{{ $gender['name'] }}</option>
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
                                            <option value="{{ $sexualOrientation['id'] }}" {{ $sexualOrientation['id'] == $users[0]['sexualOrietations']->id ? "selected" : ""  }}>{{ $sexualOrientation['name'] }}</option>
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
                                            <option value="{{ $smoking['id'] }}"  {{ $smoking['id'] == $users[0]['smokings']->id ? "selected" : "" }}>{{ $smoking['name'] }}</option>
                                        @endforeach            
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div><!-- admin -->
                                    <x-label for="admin" :value="__('ADMIN')" />
                                    <select name="admin" id="admin" class="block mt-1 w-full" required>
                                        <option value="0" {{ 0 == $users[0]->admin ? "selected" : "" }} >Não</option>
                                        <option value="1" {{ 1 == $users[0]->admin ? "selected" : "" }}> Sim</option>        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-8"><!-- description -->
                                <x-label for="description" :value="__('Descrição')" />
                                <textarea id="description" cols="10" rows="5" class="block mt-1 w-full" name="description"  id="description" required>{{ $users[0]->description }}"</textarea>
                            </div>
                            <div class="col-4" style="margin-top:108px"><!-- photo -->
                                <x-label for="photo" :value="__('Foto')" />
                                <x-input class="block mt-1 w-full" type="file" id="photo" name="photo" :value="old('photo')" />
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
                                            <option value="{{ $sexualOrientation['id'] }}" {{ $sexualOrientation['id'] == $users[0]['filters']->sexual_orientation_id ? "selected" : "" }}>{{ $sexualOrientation['name'] }}</option>
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
                                            <option value="{{ $gender['id'] }}" {{ $gender['id'] == $users[0]['filters']->gender_id ? "selected" : "" }}>{{ $gender['name'] }}</option>
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
                                            <option value="{{ $smoking['id'] }}" {{ $smoking['id'] == $users[0]['filters']->smoking_id ? "selected" : "" }}>{{ $smoking['name'] }}</option>
                                        @endforeach            
                                    </select>
                                </div>
                            </div>
                            <div class="col-1">
                                <div><!-- year_min -->
                                    <x-label for="year_min" :value="__('Idade Mín')" />
                                    <x-input id="year_min" class="block mt-1 w-full" type="number" name="year_min" value="{{ $users[0]['filters']->year_min }}" required />
                                </div>
                            </div>
                            <div class="col-1">
                                <div><!-- year_max -->
                                    <x-label for="year_max" :value="__('Idade Máx')" />
                                    <x-input id="year_max" class="block mt-1 w-full" type="number" name="year_max" value="{{ $users[0]['filters']->year_max }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-primary ml-4">Voltar</a>
                            <x-button class="ml-4">
                                {{ __('Editar') }}
                            </x-button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</x-app-layout>
