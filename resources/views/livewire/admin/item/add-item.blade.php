<div>
    <div class='container'>
        <div class='row'>
            @include('admin.flash')
            @include('admin.error')
            <form action='' wire:submit.prevent='add_item' method='post' enctype="multipart/form-data">
                @csrf
                <br><input type='text' wire:model='name' class='form-control w-25 p-3' placeholder='Name'>
                <br><input type='text' wire:model='description' class='form-control w-25 p-3'
                    placeholder='Description'>
                <div class="col">
                    <br><input type='number' wire:model='quantity' min="1" max="10"
                        class='form-control w-25 p-3' placeholder="Quantity"><br>
                </div>
                <div class="col">
                    <hr>
                    <h3>Size</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model='size' name="size" id="s"
                            value="s">
                        <label class="form-check-label" for="s">S</label>
                        <br>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model='size' name="size" id="m"
                            value="m">
                        <label class="form-check-label" for="m">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model='size' name="size" id="l"
                            value="l">
                        <label class="form-check-label" for="l">L</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model='size' name="size" id="xl"
                            value="xl">
                        <label class="form-check-label" for="xl">XL</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model='size' name="size" id="xxl"
                            value="xxl">
                        <label class="form-check-label" for="xxl">XXL</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model='size' name="size" id="xxxl"
                            value="xxxl">
                        <label class="form-check-label" for="xxxl">XXXL</label>
                    </div>
                </div>
                <hr>
                <h3>Price</h3>
                <br><input type='number' step=".5" wire:model='price' class='form-control w-25 p-3'
                    placeholder='Price'><br>
                <input type='file' wire:model='photo' accept=".jpg,.png,.gif" multiple class='form-control'><br>
                <hr>
                <h3>Categories</h3>
                @foreach ($get_cats as $cat)
                    <div class="form-check">
                        <input class="form-check-input" name="categories" type="checkbox" wire:model='get_cats_id'
                            value="{{ $cat->id }}" id="{{ $cat->id }}">
                        <label class="form-check-label" for="{{ $cat->id }}">
                            {{ $cat->name }}
                        </label>
                    </div>
                @endforeach
                <br>
                <hr>
                <h3>Item Department</h3>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"  type="radio" wire:model='department' name="department" id="men"
                        value="men">
                    <label class="form-check-label" for="men">Men</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"  type="radio" wire:model='department' name="department" id="kids"
                        value="kids">
                    <label class="form-check-label" for="kids">Kids</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"  type="radio" wire:model='department' name="department" id="women"
                        value="women">
                    <label class="form-check-label" for="women">Women</label>
                </div><br>
                <hr>
                <h3>Item Status</h3>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"  type="radio" wire:model='status' name="status" id="public"
                        value="public">
                    <label class="form-check-label" for="public">Public</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input"  type="radio" wire:model='status' name="status" id="private"
                        value="private">
                    <label class="form-check-label" for="private">Private</label>
                </div><br>
                <br><input type='submit' class='btn btn-primary' value='Add'>
            </form>
        </div>
    </div>
</div>
