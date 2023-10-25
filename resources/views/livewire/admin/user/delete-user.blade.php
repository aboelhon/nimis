<div>
    @if ($alldeletedusers->count() < 1)
        <div class="text-center">
            <br><br><br>
            <h1 class="text-center btn btn-danger col-auto text-center">Sorry There are no deleted users found</h1>
        </div>
    @else
        @include('admin.flash')
        <div class="table-responsive">
            <table class="table table-info">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Delete For Ever</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alldeletedusers as $user)
                        <tr wire:key='{{ $user->id }}'>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td><img style="height:90px;width:90px" src="{{ Storage::url($user->photo) }}"></td>
                            <td><a wire:click='restoredeleteduser({{ $user->id }})' class="btn btn-success"><i
                                        class="fa fa-window-restore" aria-hidden="true"></i> Restore</a></td>
                            <td><a wire:click='harddelete({{ $user->id }})' class="btn btn-danger"><i
                                        class="fa fa-remove" aria-hidden="true"></i> Delete For Ever</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
