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

                    

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-sm-12">
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Roles Table</h6>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td><input type="checkbox" 
                                                @foreach($user->roles as $user_role)
                                                    @if($user_role->slug == $role->slug)
                                                        checked
                                                    @endif
                                                @endforeach
                                            ></td>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->slug }}</td>
                                            <td>
                                                <form action="{{ route('user.role.attach', $user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    
                                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                                    <button type="submit"
                                                        class="btn btn-primary"
                                                        @if($user->roles->contains($role))
                                                            disabled 
                                                        @endif
                                                    >Attach</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('user.role.detach', $user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                                    <button type="submit"
                                                        class="btn btn-danger"
                                                        @if(!$user->roles->contains($role))
                                                            disabled 
                                                        @endif    
                                                    >Detach</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>