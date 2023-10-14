<div>
    @if ($deleted_cats->count() < 1)
    <div class="text-center">
        <br><br><br>
        <h1 class="text-center btn btn-danger col-auto text-center">Sorry There are no deleted categories found</h1>
    </div>
@else
    <div class="contianer">
        <div class="row">
            @include('admin.flash')
            <div class="table-responsive-md">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Restore</th>
                            <th scope="col">Delete For Ever</th>
                        </tr>
                    </thead>
                    @foreach ($deleted_cats as $cat)
                        <tbody>
                            <tr class="">
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->name }}</td>
                                <td><a wire:click.prevent='restore_category({{ $cat->id }})'
                                        class="btn btn-success"><i class="fa fa-window-restore"></i> Restore</a>
                                </td>
                                <td><a wire:click.prevent='harddelete_category({{ $cat->id }})'
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
