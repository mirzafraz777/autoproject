@extends('../layout.admin')
@section('adminContent')

<!-- Users Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="row justify-content-center">
            <div class="col-6 mb-2">
                <x-alert />
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">List of All Users</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Sr.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Current Balance</th>
                        <th scope="col">Total Earning</th>
                        <th scope="col">Ref Bonus</th>
                        {{-- <th scope="col">Status</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @dd($user);
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img class="rounded-circle me-lg-2" src="{{ asset('storage/' . optional($user->users_info)->img ?: 'images/profile/default.png') }}" alt="{{$user->name}}" style="width: 40px; height: 40px;">{{$user->name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ '$' . optional($user->users_info)->current_balance }}</td>
                        <td>{{ '$' . optional($user->users_info)->total_earning }}</td>
                        <td>{{ '$' . optional($user->users_info)->ref_bonus }}</td>

                        {{-- <td class="text-center"><a href="{{ route('user.updateStatus', $user->id) }}" class="btn btn-sm btn-{{ ($user->users_info->status == 1) ? 'success' : 'danger'}}">
                            {{ ($user->users_info->status == 1) ? 'Enable' : 'Disable' }}
                        </a> </td> --}}
                        <td>
                            <form action="{{route('admin.destroy_user',$user->id)}}" method="post" class="d-inline-block">
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
<!-- Users End -->

@endsection
