<div>
    @include('user.error')
    @include('user.flash')
    <br>
    <br>
    <input min="1" max="10" style="background-color: white" type="number" class="form-control w-25 p-6"
        wire:model.debounce.20000s='quantity'><br>
    <div wire:loading wire:traget='add_to_card' class="btn btn-danger"> Loading</div>
    <button type="button" class="btn btn-danger" wire:click.prevent='add_to_card({{ $item->id }})'>
        <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart
    </button><br><br>
</div>
