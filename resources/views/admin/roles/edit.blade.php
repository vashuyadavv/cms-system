<x-admin-master>
    @section('content')
        @if(session('role-updated'))
            <div class="alert alert-success">{{ session('role-updated') }}</div>
        @endif
        <div class="col-sm-6">
            <h1>Edit Role: {{$role->name}}</h1>

            <form action="{{route('roles.update', $role)}}" method="post">
                @csrf
                @method('PUT')
    
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    @endsection
</x-admin-master>