<x-admin-master>
    @section('content')
        <h1>User Profile for : {{ $user->name }}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('user.profile.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <img src="{{$user->avatar}}" alt="will upload it soon">
                    </div>
                    
                    <div class="form-group">
                        <input type="file" name="avatar" id="file">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" 
                               name="username" 
                               id="username" 
                               class="form-control" 
                               placeholder="Enter username"
                               value="{{ $user->username }}"
                        >

                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="form-control" 
                               placeholder="Enter name"
                               value="{{ $user->name }}"
                        >

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" 
                               name="email" 
                               id="name" 
                               placeholder="Enter email"
                               class="form-control"
                               value="{{ $user->email }}"
                        >

                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control"
                        >

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" 
                               name="confirm_password" 
                               id="confirm-password" 
                               class="form-control"
                        >

                        @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>