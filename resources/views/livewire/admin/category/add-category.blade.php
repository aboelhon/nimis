<div>
    <div class='row'>
        <h1 class="text-center">Add New Category</h1>
        @include('admin.error')
        @include('admin.flash')
        <div class='container'>
            <form wire:submit.prevent='addcategory' method='post'>
                @csrf
                <br><input type='text' name='elec' wire:model='name' class='form-control' placeholder='Name'>
                <br><input type='text' name='' wire:model='description' class='form-control'
                    placeholder='Description'>
                <br><input type='submit' name='' class='btn btn-primary' value='Add'>
            </form>
        </div>
    </div>
</div>
