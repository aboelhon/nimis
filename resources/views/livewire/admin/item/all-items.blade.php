<div>


    @if ($all_items->count() < 1)
        <div class="text-center">
            <br><br><br>
            <h1 class="text-center btn btn-danger col-auto text-center">Sorry There are no items found</h1>
        </div>
    @else
        <br>
        @include('admin.flash')
        @include('admin.error')
        {{ $all_items->links() }}
        <div class="table-responsive-sm">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Categories</th>
                        <th>Photo</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach ($all_items as $item)
                    <tbody>
                        <tr class="">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->size }}</td>
                            <td>
                                @foreach ($item->categories as $catname)
                                    <div class="btn btn-secondary"> {{ $catname->name }}</div>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->photos as $photo)
                                    <img class="img-thumbnail" style="width: 150px:150;height:150px"
                                        src="{{ Storage::url($photo->name) }}">
                                @endforeach
                            </td>
                            <td>{{ $item->department }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="" wire:click.prevent='get_items({{ $item->id }})'
                                    class="btn btn-primary"><i class="fa fa-edit"></i> Update</a>
                            </td>
                            <td>
                                <a href="" wire:click.prevent='softdelete_item({{ $item->id }})'
                                    class="btn btn-danger"><i class="fa fa-remove"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class='container-fluid'>
            <div class='row justify-content-md-center'>
                <div class="col">
                    <h3>Update Item Info</h3>
                    <hr>
                    <form wire:submit.prevent='update_items' action="post">
                        @csrf
                        <br><input wire:model.debounce.500000ms='item_name' type='text' class='form-control'
                            placeholder='Name'>
                        <br><input wire:model.debounce.500000ms='item_des' type='text' class='form-control'
                            placeholder='Description'>
                        <br><input wire:model.debounce.500000ms='item_price' type='number' class='form-control'
                            placeholder='Price'><br>
                        <input type='submit' class='btn btn-primary' value='Update'><br>
                    </form>
                </div>
                <div class="col">
                    <h3>Update Item Category</h3>
                    <hr>
                    @if ($item_category != null)
                        @foreach ($item_category as $item_cat)
                            <div class="btn btn-danger"> {{ $item_cat->name }} </div>
                        @endforeach
                    @endif
                    <form wire:submit.prevent='update_item_category'>
                        @csrf
                        @foreach ($all_categories as $cat)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model='item_cat_id'
                                    value="{{ $cat->id }}" id="{{ $cat->id }}">
                                <label class="form-check-label" for="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </label>
                            </div>
                        @endforeach
                        <input type='submit' class='btn btn-primary' value='Update'><br>
                    </form>
                </div>
                <div class="col">
                    <h3>Update Item Quantity</h3>
                    <hr>
                    @if ($item_quantity)
                        <div class="btn btn-danger">{{ $item_quantity }}</div>
                    @endif
                    <br>
                    <br>
                    <form wire:submit.prevent='update_item_quantity'>
                        @csrf
                        <input type="number" wire:model='item_quantity' class="form-control"> <br>
                        <input type='submit' class='btn btn-primary' value='Update'>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Update Item Size</h3>
                    <hr>
                    @if ($item_size)
                        <div class="btn btn-danger">{{ $item_size }}</div>
                    @endif
                    <br>
                    <form wire:submit.prevent='update_item_size'>
                        @csrf
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_size' name="size"
                                id="s" value="s">
                            <label class="form-check-label" for="s">S</label>
                            <br>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_size' name="size"
                                id="m" value="m">
                            <label class="form-check-label" for="m">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_size' name="size"
                                id="l" value="l">
                            <label class="form-check-label" for="l">L</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_size' name="size"
                                id="xl" value="xl">
                            <label class="form-check-label" for="xl">XL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_size' name="size"
                                id="xxl" value="xxl">
                            <label class="form-check-label" for="xxl">XXL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_size' name="size"
                                id="xxxl" value="xxxl">
                            <label class="form-check-label" for="xxxl">XXXL</label>
                        </div><br>
                        <input type='submit' class='btn btn-primary' value='Update'>
                    </form>
                </div>
                <div class="col">
                    <h3>Update Item Photo</h3>
                    <hr>
                    <form wire:submit.prevent='update_photo'>
                        @csrf
                        <br><input wire:model.debounce.500000ms='item_photo' accept=".jpg,.png,.gif" multiple
                            type=file class='form-control'><br>
                        <input type='submit' class='btn btn-primary' value='Update'><br>
                    </form>
                </div>
                <div class="col">
                    <h3>Department</h3>
                    <hr>
                    <form wire:submit.prevent='update_item_department'>
                        @csrf
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_department'
                                id="men" value="men">
                            <label class="form-check-label" for="men">Men</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_department'
                                id="women" value="women">
                            <label class="form-check-label" for="women">Women</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_department'
                                id="kids" value="kids">
                            <label class="form-check-label" for="kids">Kids</label>
                        </div><br>
                        <input type='submit' class='btn btn-primary' value='Update'><br>
                    </form>
                </div>
                <div class="col">
                    <h3>Status</h3>
                    <hr>
                    @if ($item_status)
                        <div class="btn btn-danger">{{ $item_status }}</div>
                    @endif
                    <form wire:submit.prevent='update_item_status'>
                        @csrf
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_status' name="status"
                                id="public" value="public">
                            <label class="form-check-label" for="public">Public</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model='item_status' name="status"
                                id="private" value="private">
                            <label class="form-check-label" for="private">Private</label>
                        </div><br>
                        <br><input type='submit' class='btn btn-primary' value='Update'>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
