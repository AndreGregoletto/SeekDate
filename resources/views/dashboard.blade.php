<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight row">
            <div class="col-6">
                {{ __('Dashboard') }}
            </div>
            <div class="col-6 text-end">
                {{ __('Welcome') }}
            </div>
        </h2>
    </x-slot>

    {{-- @dd($oProfile) --}}
    @if(isset($oProfile))
        <div class="container">
            <div class="row">
                <div class="col-1" style="margin-top: 300px">
                    <a href="{{ route('returnRecuse', $oProfile->id) }}"
                        onclick="event.preventDefault();
                        document.getElementById('recuse-{{ $oProfile->id }}').submit();"
                        class="match-recuse"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x-circle-fill icon-recuse" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                    </a>
                    <form action="{{ route('returnRecuse', $oProfile->id) }}" id="recuse-{{ $oProfile->id }}" method="POST">
                        @csrf
                        <input type="text" name="id" hidden value="{{ $oProfile->id }}">
                    </form>
                </div>
                
                <div class="py-12 col-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="card m-5" style="max-width: 2000px; min-height: auto">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/'.$oProfile->photo) }}"  class="rounded d-block" style="max-height: 425px; min-height: 425px;">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                <h5 class="card-title fs-5">Nome: <strong class="fs-3"><em>{{ $oProfile->nick_name }}</em></strong></h5>
                                                <p class="card-text fs-5">Idade: <strong class="fs-4"><em>{{ $oProfile->year }}</em></strong> Anos</p>
                                                <p class="card-text fs-5">Trabalha com: <strong class="fs-4"><em>{{ $oProfile->job }}</em></strong></p>
                                                <p class="card-text fs-5">Mora em: <strong class="fs-4"><em>{{ $oProfile->livin_in }}</em></strong></p>
                                                <p class="card-text fs-5">Descrição:</p>
                                                <p><strong class="fs-4"><em>{{ $oProfile->description }}</em></strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-1" style="margin-top: 300px">
                    <a href="{{ route('returnAccept', $oProfile->id) }}"
                        onclick="event.preventDefault();
                        document.getElementById('accept-{{ $oProfile->id }}').submit();"
                        class="match-accept"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-through-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l3.103-3.104a.5.5 0 1 1 .708.708L4.5 12.207V14a.5.5 0 0 1-.146.354l-1.5 1.5ZM16 3.5a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182A23.825 23.825 0 0 1 5.8 12.323L8.31 9.81a1.5 1.5 0 0 0-2.122-2.122L3.657 10.22a8.827 8.827 0 0 1-1.039-1.57c-.798-1.576-.775-2.997-.213-4.093C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3Z"/>
                        </svg> 
                    </a>
                    <form action="{{ route('returnAccept', $oProfile->id) }}" id="accept-{{ $oProfile->id }}" method="POST">
                        @csrf
                        <input type="text" name="id" hidden value="{{ $oProfile->id }}">
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="card m-5" style="max-width: auto; min-height: auto">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/photo/ursoSemResultado.png') }}"  class="rounded mx-auto d-block">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title fs-5"><strong class="fs-3"><em>Você não tem matchings no momento...
                                            Mas é questão de tempo até aparecer um... 😎😘</em></strong></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif


</x-app-layout>
