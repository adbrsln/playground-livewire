<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    @endif
                    <div class="row mb-3 d-flex justify-content-between">
                        <div class="col-md-6">
                            <input type="text" wire:model.500ms="search" class="form-control" placeholder="Search...">
                        </div>
                        <div class="col-md-2">
                            <button type="button"  class="btn btn-primary float-right" data-toggle="modal" data-target="#newRecord">New Record</button>
                            {{-- <button type="button" wire:click="$emit('userAdded')" class="btn btn-primary float-right" >New Record</button> --}}
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Email Verified</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @livewire('home.record',['user'=>$user],key($user->id))
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form wire:submit.prevent="saveRecord">
        <div class="modal-body">
                <label for="">Name</label>
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Abu Said" required>
                @error('name')
                <p class="mt-2 text-sm text-red">{{ $error->name }}</p>
                @enderror
                <label for="">Email</label>
                <input type="email" class="form-control mb-3" name="email" id="email" placeholder="abusaid@email.com" required>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
        </div>
    </div>
    </div>

