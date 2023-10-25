<div>
    @if ($alldeletedadmins->count() > 0)
        @include('admin.flash')
        <div class="table-responsive">
            <table class="table table-info">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Delete For Ever</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alldeletedadmins as $admin)
                        <tr wire:key='{{ $admin->id }}'>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->username }}</td>
                            <td><img style="height:90px;width:90px" src="{{ Storage::url($admin->photo) }}"></td>
                            <td><a wire:click='restoredeletedadmin({{ $admin->id }})' class="btn btn-success"><i
                                        class="fa fa-window-restore" aria-hidden="true"></i> Restore</a></td>
                            <td><a wire:click='harddelete({{ $admin->id }})' class="btn btn-danger"><i
                                        class="fa fa-remove" aria-hidden="true"></i> Delete For Ever</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center">
            <br><br><br>
            <h1 class="text-center btn btn-danger col-auto text-center">Sorry There are no deleted admins</h1>
        </div>
    @endif
</div>
