<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('permissions.update' , $permission->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <lable for="name">Name</lable>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$permission->name}}" >
                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
        @endsection
</x-admin-master>
