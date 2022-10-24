<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Matchs') }}
        </h2>
    </x-slot>

    @if($datas[0] != null)
        <div class="container">
            <div class="row">
                <div class="col-1" style="margin-top: 250px">
                    <a href="{{ $datas->previousPageUrl() }}" rel="next"><!-- Recuse -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
                          </svg>
                    </a>
                </div>
                <div class="py-12 col-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                @foreach ($datas as $data)
                                    <div class="card m-5" style="max-width: auto; min-height: auto">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/'.$data['photo']) }}"  class="rounded mx-auto d-block">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title fs-5">Nome: <strong class="fs-3"><em>{{ $data->nick_name }}</em></strong></h5>
                                                    <p class="card-text fs-5">Idade: <strong class="fs-4"><em>{{ $data->year }}</em></strong></p>
                                                    <p class="card-text fs-5">Trabalha com: <strong class="fs-4"><em>{{ $data->job }}</em></strong></p>
                                                    <p class="card-text fs-5">Mora em: <strong class="fs-4"><em>{{ $data->livin_in }}</em></strong></p>
                                                    <p class="card-text fs-5">Descrição:</p>
                                                    <p><strong class="fs-4"><em>{{ $data->description }}</em></strong></p>
                                                    {{-- {{ $data->id }} --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: -30px">
                                        <div class="col-6 d-flex">
                                            <a href="{{ route('recuseMatch', $data->id) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('recuse-{{ $data->id }}').submit();"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                </svg>
                                            </a>
                                            <form action="{{ route('recuseMatch', $data->id) }}" id="recuse-{{ $data->id }}" method="POST">
                                                @csrf
                                                <input type="text" name="id" hidden value="{{ $data->id }}">
                                            </form>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">
                                            <a href="{{ route('acceptMatch', $data->id) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('accept-{{ $data->id }}').submit();"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-through-heart-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l3.103-3.104a.5.5 0 1 1 .708.708L4.5 12.207V14a.5.5 0 0 1-.146.354l-1.5 1.5ZM16 3.5a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182A23.825 23.825 0 0 1 5.8 12.323L8.31 9.81a1.5 1.5 0 0 0-2.122-2.122L3.657 10.22a8.827 8.827 0 0 1-1.039-1.57c-.798-1.576-.775-2.997-.213-4.093C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3Z"/>
                                                </svg> 
                                            </a>
                                            <form action="{{ route('acceptMatch', $data->id) }}" id="accept-{{ $data->id }}" method="POST">
                                                @csrf
                                                <input type="text" name="id" hidden value="{{ $data->id }}">
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1" style="margin-top: 250px"><!-- Accept -->
                    <a href="{{ $datas->nextPageUrl() }}" rel="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
                        </svg>
                    </a>
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
                                        <h5 class="card-title fs-5"><strong class="fs-3"><em>Não conseguimos encontrar ninguém compatível... 
                                            Mas não se culpe, isso diz muito mais sobre eles doque sobre você! 😉</em></strong></h5>
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
