<x-admin-master>
    @section('content')
        <h1>User Profile For : {{$user->name}}</h1>
         <div class="row">
             <div class="col-sm-6">
                 <form method="post" action="{{route('user.profile.update',$user->id)}}" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="mb-4">
                         <img height="200bx" class="img-profile rounded-circle" src="{{'/storage/'.$user->avatar}}">
                     </div>
                     <div class="">
                         <input type="file" name="avatar">
                         @error('Avatar')
                         <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                     </div>
                     <div class="form-group">
                         <lable for="username">Username</lable>
                         <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}" >
                         @error('username')
                         <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                     </div>
                     <div class="form-group">
                         <lable for="name">Name</lable>
                         <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" >
                         @error('name')
                         <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                     </div>
                     <div class="form-group">
                         <lable for="email">email</lable>
                         <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}" >
                         @error('email')
                         <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                     </div>
                      <div class="form-group">
                      <lable for="password">password</lable>
                     <input type="password" name="password" class="form-control" id="password">
                          @error('password')
                          <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                          </div>
                     <div class="form-group">
                         <lable for="password-confirmation">Confirm Password</lable>
                         <input type="password" name="password_confirmation" class="form-control" id="password-confirmation">
                     </div>
                     <div class="mb-4">
                     <button type="submit" class="btn btn-primary">submit</button>
                     </div>
                 </form>
             </div>
         </div>
{{--        //roles_users_table--}}

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Option</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>slug</th>
                            <th>Attach</th>
                            <th>Detach</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Option</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>slug</th>
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
                                            Checked
                                        @endif
                                        @endforeach>

                                </td>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>
                                    <form method="post" action="{{route('user.role.attach',$user)}}">
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary"
                                        @if($user->roles->contains($role))
                                           disabled
                                        @endif
                                        >Attach</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('user.role.detach',$user)}}">
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger"
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


    @endsection
</x-admin-master>
