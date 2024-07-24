@extends('../layout.admin')
@section('adminContent')

    <!-- Packages Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Add New Package</h6>
                <a href="{{route('packages.index')}}" class="btn btn-square btn-outline-secondary m-2"><i class="fa fa-arrow-left"></i></a>
            </div>

            <form method="POST" action="{{route('packages.store')}}">
                @csrf
                @method('POST')
                <div class="row">

               <div class="col-sm-12 col-xl-6">
                <div class="  h-100 p-xl-2 p-sm-0">
                        <div class="row mb-3">
                            <label for="inputPkgName" class="col-sm-2 col-form-label">Package Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPkgName" name="package_name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPrice" name="package_price">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumberOfDays" class="col-sm-2 col-form-label">No of days</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputNumberOfDays" name="package_days">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="  h-100 p-xl-2 p-sm-0">
                        <div class="row mb-3">
                            <label for="selectCateogry" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" id="selectCateogry" name="package_category" >
                                    <option selected>Select Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumberOfDays" class="col-sm-2 col-form-label">Select Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="packageImg" type="file" name="pacakge_image">
                                </div>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Featured</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="featuredCheck" value="1" name="featured_package">
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
