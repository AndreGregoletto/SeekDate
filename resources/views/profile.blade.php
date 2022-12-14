<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Perfil') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="card m-5" style="max-width: 2000px; min-height: auto">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('storage/'.$oUser['photo']) }}"  class="rounded d-block" style="max-height: 425px; min-height: 425px;">
              </div>
              <div class="col-md-7">
              <div class="card-body">
                  <h5 class="card-title fs-5">Nome: <strong class="fs-3"><em>{{ $oUser['nick_name'] }}</em></strong></h5>
                  <p class="card-text fs-5">Idade: <strong class="fs-4"><em>{{ $oUser['year'] }}</em></strong></p>
                  <p class="card-text fs-5">Trabalha com: <strong class="fs-4"><em>{{ $oUser['job'] }}</em></strong></p>
                  <p class="card-text fs-5">Mora em: <strong class="fs-4"><em>{{ $oUser['livin_in'] }}</em></strong></p>
                  <p class="card-text fs-5">Descrição:</p>
                  <p><strong class="fs-4"><em>{{ $oUser['description'] }}</em></strong></p>
                </div>
              </div>
            </div>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: -20px">
            <a href="{{route('profile.edit', $oUser['id'])}}">
              <x-button class="ml-4">
                {{ __('Editar') }}
              </x-button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
