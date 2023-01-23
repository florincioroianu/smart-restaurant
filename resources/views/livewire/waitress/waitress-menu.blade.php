<div class="container-fluid card">
    <div class="card-body">
        <div class="row mb-4">
            @if (Auth::user()->role == 'ospatar' || Auth::user()->role == 'admin')
                <div class="col-sm-6 mb-2 d-grid">
                    <button type="button" class="btn btn-danger btn-lg" wire:click="changeView('food')">Meniu
                        mancare
                    </button>
                </div><!-- end of col -->
            @endif

            <div class="col-sm-6 mb-2 d-grid">
                <button type="button" class="btn btn-info btn-lg" wire:click="changeView('drink')">Meniu
                    bauturi
                </button>
            </div>

            <div class="col-sm-6 mb-2 d-grid">
                <button type="button" class="btn btn-success btn-lg" wire:click="changeView('cart')">Comanda
                    ({{ $cart_count }})
                </button>
            </div>
        </div><!-- end of row -->
        <div class="row" wire:init="setCartCount()">
            <div class="col">
                @if ($active_view == 'food')
                    <div class="card border border-danger">
                        <div class="card-header">
                            Comanda mancare
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionDrinks">
                                @foreach ($foods as $food)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-drinks{{ $food->id }}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-drinks{{ $food->id }}"
                                                    aria-expanded="true"
                                                    aria-controls="collapse-drinks{{ $food->id }}">
                                                {{ $food->name }}
                                            </button>
                                        </h2>
                                        <div id="collapse-drinks{{ $food->id }}" class="accordion-collapse collapse"
                                             aria-labelledby="heading-drinks{{ $food->id }}">
                                            <div class="accordion-body">
                                                <div class="row gx-3 gy-3">
                                                    @foreach ($food->menu as $menu)
                                                        <ul class="d-grid">
                                                            <a href="#" wire:click="addOrder({{ $menu }}, 1)"
                                                               class="text-decoration-none text-dark">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        {{ $menu->name }} - {{ $menu->price }}
                                                                        <strong><em> RON </em></strong>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </ul>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @elseif($active_view == 'drink')
                    <div class="card border border-info">
                        <div class="card-header">
                            Comanda bauturi
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionDrinks">
                                @foreach ($drinks as $drink)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-drinks{{ $drink->id }}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-drinks{{ $drink->id }}"
                                                    aria-expanded="true"
                                                    aria-controls="collapse-drinks{{ $drink->id }}">
                                                {{ $drink->name }}
                                            </button>
                                        </h2>
                                        <div id="collapse-drinks{{ $drink->id }}" class="accordion-collapse collapse"
                                             aria-labelledby="heading-drinks{{ $drink->id }}">
                                            <div class="accordion-body">
                                                <div class="row gx-3 gy-3">
                                                    @foreach ($drink->menu as $menu)
                                                        <ul class="d-grid">
                                                            <a href="#" wire:click="addOrder({{ $menu }}, 0)"
                                                               class="text-decoration-none text-dark">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        {{ $menu->name }} - {{ $menu->price }}
                                                                        <strong><em> RON </em></strong>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </ul>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @elseif ($active_view == 'cart')
                    <div class="card border border-success">
                        <div class="card-header">
                            Trimite comanda
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                <tr>
                                    <th>Titlu</th>
                                    <th width="3%">Pret</th>
                                    <th width="10%">Cantitate</th>
                                    <th width="40%">Actiune</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse (\Cart::getContent() as $order)
                                    <tr>
                                        <td>
                                            {{ $order['name'] }}
                                        </td>
                                        <td>
                                            {{ $order['price'] }}
                                        </td>
                                        <td>
                                            {{ $order['quantity'] }}
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" type="button"
                                                    wire:click.defer="increaseItem({{$order}})">+
                                            </button>
                                            <button class="btn btn-warning" type="button"
                                                    wire:click.defer="decreaseItem({{$order}})">-
                                            </button>
                                            <button class="btn btn-danger" type="button"
                                                    wire:click.defer="removeItem({{$order}})">x
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <h4 class="text-center">Nicio comanda adaugata</h4>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" wire:model.defer="order_note" placeholder="Observatii"
                                               class="form-control form-control-lg">
                                    </td>
                                    <th class="text-center">Total</th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class="form-check-label" for="card_pay">Plata card</label>
                                        <input id="card_pay" type="checkbox" wire:model.defer="card_pay"
                                               class="form-check-input">
                                        <span class="mx-2"></span>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger px-3" wire:click.defer="clearItems()">
                                            X
                                        </button>
                                        <button class="btn btn-success px-3" wire:click.defer="saveOrder()">
                                            Trimite
                                        </button>
                                    </td>
                                    <td>
                                        <h4 class="text-center">{{\Cart::getTotal()}} RON</h4>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div><!-- end of card-body -->
</div>
