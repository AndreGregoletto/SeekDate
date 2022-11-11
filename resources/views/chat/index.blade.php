<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight row">
            <div class="col-6">
                {{ __('Chat') }}
            </div>
        </h2>
    </x-slot>

    @if(isset($usersChat[0])))
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="position-relative col-2">
                <div class="bg-light rounded-3 border border-dark overflow-auto position-fixed p-2" style="max-height: 623px;">
                    <table class="table table-hover">
                        <tbody>
                            @foreach($chatSelect as $chat)
                            <tr>
                                <td><a href="#" class="pe-auto">
                                    <img src="{{ asset('storage/'.$chat['photo'] ) }}" class="rounded-circle border-3 border-success figure-img img-fluid" style="width: 75px;height:75px">
                                </a></td>
                                <td><p class="fw-lighter mt-4">{{ $chat['nick_name'] }}</p></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-9 bg-light rounded-3 border border-secondary border-2 end-0 p-4 mr-5">
                <fieldset class="container">
                    <span class="row border-bottom">
                        <div class="col-6 mb-2">
                            <img src="{{ asset('storage/'.$chat['photo'] ) }}" class="rounded-circle border-5 border-success" style="width: 75px;height:75px">
                        </div>
                        <p class="col-6 text-end mt-4">{{ $chat['nick_name'] }}</p>
                    </span>
                </fieldset>
                <div class="container">
                    <fieldset class="overflow-auto row" style="max-height: 400px;min-height: 400px;">
                        <div class="row">
                            <div class="col-md-6 border border-primary rounded-3 m-2 p-2">Oi, como vai?como vaicomo vaicomo vaicomo vaicomo vaicomo vaicomo vaicomo vai</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-6 border border-info rounded-3 mt-2 mb-2 p-2">Oi, como vai?como vaicomo vaicomo vaicomo vaicomo vaicomo vaicomo vaicomo vai</div>
                        </div>                        
                    </fieldset>
                </div>
                <textarea class="mt-2 rounded-3 form-control border-2 border-secondary" name="" id="" cols="120" rows="2" placeholder="..."></textarea>
            </div>
        </div>
    </div>
    @endif
    

</x-app-layout>