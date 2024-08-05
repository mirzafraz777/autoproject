
@extends('../layout.admin')
@section('adminContent')
    <!-- Category Start -->
    <div class="container-fluid pt-4 px-4">
        <x-alert />
        <div class="bg-light text-center rounded p-4">
            <div class="row justify-content-center">
                <div class="col-6 mb-2">
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">List of All Categories</h6>
                <a href="{{route('category.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Sr.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{route('category.destroy',$category->id)}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger "> <i class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- category End -->
@endsection
