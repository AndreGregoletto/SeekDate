<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="container">
            @csrf
            <div class="row">
                <div class="col-6">            
                    <div><!-- Name -->
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                </div>
                <div class="col-6">
                    <div><!-- Email Address -->
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-4"><!-- Password -->
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- Confirm Password -->
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-4"><!-- nick_name -->
                        <x-label for="nick_name" :value="__('Apelido')" />
                        <x-input id="nick_name" class="block mt-1 w-full" type="text" name="nick_name" :value="old('nick_name')" required />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- cell  -->
                        <x-label for="cell" :value="__('Número')" />
                        <x-input id="cell" class="block mt-1 w-full" type="text" name="cell" :value="old('cell')" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-4"><!-- Year  -->
                        <x-label for="year" :value="__('Idade')" />
                        <x-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- Job  -->
                        <x-label for="job" :value="__('Trabalha com?')" />
                        <x-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-4"><!-- Livin_in  -->
                        <x-label for="livin_in" :value="__('Mora em')" />
                        <x-input id="livin_in" class="block mt-1 w-full" type="text" name="livin_in" :value="old('livin_in')" required />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- Gender_id -->
                        <x-label for="gender_id" :value="__('Gênero')" />
                        <select name="gender_id" id="gender_id" class="block mt-1 w-full" required>
                            <option value="0" selected disabled>Selecione</option>
                            @foreach($genders as $gender)    
                                <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-4"><!-- sexual_orietation_id  -->
                        <x-label for="sexual_orientation_id" :value="__('Orientação Sexual')" />
                        <select name="sexual_orientation_id" id="sexual_orientation_id" class="block mt-1 w-full" required>
                            <option value="0" selected disabled>Selecione</option>
                            @foreach($sexualOrientations as $sexualOrientation)    
                                <option value="{{ $sexualOrientation['id'] }}">{{ $sexualOrientation['name'] }}</option>
                            @endforeach            
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- Smoking_id -->
                        <x-label for="smoking_id" :value="__('Fuma?')" />
                        <select name="smoking_id" id="smoking_id" class="block mt-1 w-full" required>
                            <option value="0" selected disabled>Selecione</option>
                            @foreach($smokings as $smoking)    
                                <option value="{{ $smoking['id'] }}">{{ $smoking['name'] }}</option>
                            @endforeach            
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt-4"><!-- description -->
                    <x-label for="description" :value="__('Descrição')" />
                    <textarea id="description" cols="10" rows="5" class="block mt-1 w-full" name="description"  id="description" :value="old('description')" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="mt-4"><!-- photo -->
                    <x-label for="photo" :value="__('Foto')" />
                    <x-input class="block mt-1 w-full" type="file" id="photo" name="photo" :value="old('photo')" required />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-5"><!-- Filtro -->
                        <x-label for="filter_id"  :value="__('Filtro')" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- sexual_orietation_id  -->
                        <x-label for="sexual_orientation" :value="__('Orientação Sexual')" />
                        <select name="sexual_orientation" id="sexual_orientation" class="block mt-1 w-full" required>
                            <option value="0" selected disabled>Selecione</option>
                            @foreach($sexualOrientations as $sexualOrientation)    
                                <option value="{{ $sexualOrientation['id'] }}">{{ $sexualOrientation['name'] }}</option>
                            @endforeach            
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-4"><!-- Gender_id -->
                        <x-label for="gender" :value="__('Gênero')" />
                        <select name="gender" id="gender" class="block mt-1 w-full" required>
                            <option value="0" selected disabled>Selecione</option>
                            @foreach($genders as $gender)    
                                <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- Smoking_id -->
                        <x-label for="smokings" :value="__('Fuma?')" />
                        <select name="smokings" id="smokings" class="block mt-1 w-full" required>
                            <option value="0" selected disabled>Selecione</option>
                            @foreach($smokings as $smoking)    
                                <option value="{{ $smoking['id'] }}">{{ $smoking['name'] }}</option>
                            @endforeach            
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mt-4"><!-- year_min -->
                        <x-label for="year_min" :value="__('Idade Mínima')" />
                        <x-input id="year_min" class="block mt-1 w-full" type="number" name="year_min" :value="old('year_min')" required />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4"><!-- year_max -->
                        <x-label for="year_max" :value="__('Idade Máxima')" />
                        <x-input id="year_max" class="block mt-1 w-full" type="number" name="year_max" :value="old('year_max')" required />
                    </div>
                </div>
            </div>                 
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já tem registro?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
