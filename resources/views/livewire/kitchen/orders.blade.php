<div class="container-fluid px-4" wire:poll.5000ms>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    Comenzi noi
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @forelse ($new_orders as $index => $order)
                        <li class="my-3 d-grid"><button class="btn btn-block btn-lg btn-danger"
                                wire:click="receiveOrder({{ $order }})">Comanda noua nr.
                                {{ $index + 1 }}</button></li>
                                <audio autoplay>
                                    <source src="{{ asset('files/zen.mp3') }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                        @empty
                        <li>
                            <h4>Nicio comanda noua</h4>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Primite
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @forelse ($received_orders as $index => $order)
                            <table class="table table-condensed mb-5">
                                <thead>
                                    <tr>
                                        <th>Nr.</th>
                                        <th>Titlu</th>
                                        <th>Cantitate</th>
                                    </tr>
                                <tbody>
                                    @foreach ($order as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item['title'] }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Note: </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td colspan="2" class="text-center">
                                            <button class="btn btn-danger px-4"
                                                wire:click="cancelOrder({{ $order }})">Anulare</button>
                                            <button class="btn btn-primary px-4"
                                                wire:click="processOrder({{ $order }})">Procesare</button>
                                        </td>
                                    </tr>
                                </tfoot>
                                </thead>
                            </table>
                            <hr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <h4 class="text-center">
                                        Nicio comanda primita
                                    </h4>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Comenzi procesate
                </div>
                <div class="card-body">
                    <table class="table">
                       @forelse ($processed_orders as $order)
                         <table class="table table-condensed mb-4">
                             <thead>
                                 <tr>
                                     <th>Nr</th>
                                     <th>Titlu</th>
                                     <th>Cantitate</th>
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach ($order as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['title'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                </tr>
                                @endforeach
                             </tbody>
                         </table>
                       @empty
                           <h4>Nicio comanda procesata</h4>
                       @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
