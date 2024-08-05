@extends('../layout.admin')
@section('adminContent')

    <!-- Packages Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light  rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Edit Category</h6>
                <a href="{{route('category.index')}}" class="btn btn-square btn-outline-secondary m-2"><i class="fa fa-arrow-left"></i></a>
            </div>
            <x-alert  />
            <form method="POST" action="{{route('category.update',$category->id)}}">
                @csrf
                @method('PUT')
                <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="  h-100 p-xl-2 p-sm-0">
                        <div class="row mb-3">
                            <label for="inputPkgName" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror " id="inputPkgName" name="category_name" value="{{ old('category_name',$category->category_name) }}" autofocus>
                                @error('category_name')
                                <div class="invalid-feedback ">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-sm-12 col-xl-6">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
