@extends('../layout.admin')
@section('adminContent')


            <!-- Packages Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="row justify-content-center">
                        <div class="col-6 mb-2">
                            <x-alert />
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">List of All Packages</h6>
                        <a href="{{route('packages.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Sr.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Buying Times</th>
                                    <th scope="col">Bonus Interval</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($packages as $package)
                                <tr>
                                    <td>{{$package->id}}</td>
                                    <td><img class="rounded-circle me-lg-2" src="{{asset('storage/'.$package->image) }}" alt="{{$package->name}}" style="width: 40px; height: 40px;">{{$package->name}}</td>
                                    <td>{{$package->category->category_name}}</td>
                                    <td>{{'$'.$package->price}}</td>
                                    <td>{{$package->counter}}</td>
                                    <td>{{$package->no_of_days}}</td>
                                    <td>{{  ($package->type) ? 'Featured':'Normal'  }}</td>
                                    <td>
                                        <a href="{{route('packages.edit',$package->id)}}" class="btn btn-sm btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{route('packages.destroy',$package->id)}}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger "> <i class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Packages End -->



@endsection
