<x-admin-master>
    @section('content')
        @if(session('permission-updated'))
            <div class="alert alert-success">{{ session('permission-updated') }}</div>
        @endif

        <div class="row"> 
            <div class="col-sm-6">
                <h1>Edit Role: {{$permission->name}}</h1>

                <form action="{{route('permissions.update', $permission)}}" method="post">
                    @csrf
                    @method('PUT')
        
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>