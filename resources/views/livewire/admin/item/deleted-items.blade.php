<div>
    <div class="contianer">
        <div class="row">
            @include('admin.flash')
            @if ($deleted_items->count() < 1)
            <div class="text-center" > 
                  <br><br><br>
                  <h1 class="text-center btn btn-danger col-auto text-center">Sorry There are no deleted items found</h1>
              </div>
            @else
                <div class="table-responsive-md">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Restore</th>
                                <th scope="col">Delete For Ever</th>
                            </tr>
                        </thead>
                        @foreach ($deleted_items as $item)
                            <tbody>
                                <tr class="">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        @foreach ($items_photos as $photo)
                                            <img class="img-thumbnail" style="width: 150px:150;height:150px"
                                                src="{{ Storage::url($photo->name) }}">
                                        @endforeach
                                    </td>
                                    <td><a wire:click.prevent='restore_item({{ $item->id }})'
                                            class="btn btn-success"><i class="fa fa-window-restore"></i> Restore</a>
                                    </td>
                                    <td><a wire:click.prevent='harddelete_item({{ $item->id }})'
                                            class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

        </div>
    </div>
    @endif

</div>
