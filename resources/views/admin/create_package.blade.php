@extends('../layout.admin')
@section('adminContent')

    <!-- Packages Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light  rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Add New Package</h6>
                <a href="{{route('packages.index')}}" class="btn btn-square btn-outline-secondary m-2"><i class="fa fa-arrow-left"></i></a>
            </div>

            <form method="POST" action="{{route('packages.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">

               <div class="col-sm-12 col-xl-6">
                <div class="  h-100 p-xl-2 p-sm-0">
                        <div class="row mb-3">
                            <label for="inputPkgName" class="col-sm-2 col-form-label">Package Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('package_name') is-invalid @enderror " id="inputPkgName" name="package_name" value="{{ old('package_name') }}" autofocus>
                                @error('package_name')
                                <div class="invalid-feedback ">
                                    <span>{{ $message }}</span>
                                </div>   
                                  @enderror                         
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('package_price') is-invalid @enderror" id="inputPrice" name="package_price" value="{{ old('package_price') }}">
                                @error('package_price')
                                <div class="invalid-feedback ">
                                    <span>{{ $message }}</span>
                                </div>   
                                  @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumberOfDays" class="col-sm-2 col-form-label">No of days</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('package_days') is-invalid @enderror" id="inputNumberOfDays" name="package_days" value="{{ old('package_days') }}">
                                @error('package_days')
                                <div class="invalid-feedback ">
                                    <span>{{ $message }}</span>
                                </div>   
                                  @enderror                                                     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="  h-100 p-xl-2 p-sm-0">
                        <div class="row mb-3">
                            <label for="selectCateogry" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('package_category') is-invalid @enderror mb-3" id="selectCateogry" name="package_category" >
                                    <option value="" selected>Select Category</option>
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->id}}" @selected(old('package_category') == $cat->id) >{{$cat->category_name}}</option>                                        
                                    @endforeach
                                </select>
                                @error('package_category')
                                <div class="invalid-feedback ">
                                    <span>{{ $message }}</span>
                                </div>   
                                  @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="packageImg" class="col-sm-2 col-form-label">Select Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('package_image') is-invalid @enderror" id="packageImg" type="file" name="package_image">
                                    @error('package_image')
                                    <div class="invalid-feedback ">
                                        <span>{{ $message }}</span>
                                    </div>   
                                      @enderror                                                             
                                </div>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Featured</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="featuredCheck" value="1" name="featured_package" {{ old('featured_package') == '1' ? 'checked' : '' }}>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-sm-12 col-xl-6">
                    <button type="submit" class="btn btn-primary">Add Package</button>
                </div>
            </form>
        </div>
    </div>
@endsection
