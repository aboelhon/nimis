<div>

    <br>

    @if ($all_categories->count() < 1)
        <div class="text-center">
            <br><br><br>
            <h1 class="text-center btn btn-danger col-auto text-center">Sorry There are no categories found</h1>
        </div>
    @else
        {{ $all_categories->links() }}
        @include('admin.flash')
        @include('admin.error')
        <div class="table-responsive-sm">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                @foreach ($all_categories as $category)
                    <tbody>
                        <tr class="">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="" wire:click.prevent='get_categories({{ $category->id }})'
                                    class="btn btn-primary"><i class="fa fa-edit"></i> Update</a>
                            </td>
                            <td>
                                <a href="" wire:click.prevent='softdelete_category({{ $category->id }})'
                                    class="btn btn-danger"><i class="fa fa-remove"></i>
                                    Delete</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

        <div class='container'>
            <div class='row'>
                <form wire:submit.prevent='update_categories' action="post">
                    @csrf
                    <br><input wire:model.debounce.500000ms='category_name' type='text' class='form-control'
                        placeholder='Name'>
                    <br><input wire:model.debounce.500000ms='category_description' type='text' class='form-control'
                        placeholder='Description'><br>
                    <input type='submit' class='btn btn-primary' value='Update'><br>
                </form>
            </div>
        </div>
    @endif
</div>
