<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-6">
            <form method="post" action="{{route('roles.update' , $role)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <lable for="name">Name</lable>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$role->name}}" >
                </div>

                <button type="submit" class="btn btn-primary">submit</button>
            </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Permission</h6>
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
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td><input type="checkbox"
                                                   @foreach($role->permissions as $role_permission)
                                                   @if($role_permission->slug == $permission->slug)
                                                   Checked
                                                @endif
                                        @endforeach>

                                        </td>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        <td>
                                            <form method="post" action="{{route('role.permission.attach',$role)}}">
                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-primary"
                                                        @if($role->permissions->contains($permission))
                                                        disabled
                                                        @endif
                                                >Attach</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('role.permission.detach',$role)}}">
                                                <input type="hidden" name="permission" id="permission" value="{{$permission->id}}">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger"
                                                        @if(!$role->permissions->contains($permission))
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
