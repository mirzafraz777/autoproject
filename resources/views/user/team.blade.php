@extends('../layout.users')
@section('userContent')



            <!-- Team Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Referral Members List</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Sr.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    {{-- <th scope="col"></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->isNotEmpty())
                                @foreach ($users as $user)


                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->team_info->name }}   </td>
                                    <td><img class="rounded-circle me-lg-2" src="{{ Storage::url($user->img) }}" alt="" style="width: 40px; height: 40px;"></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center h5 text-danger">No Refferal found!</td>
                                </tr>
                                @endif

                            </tbody>

                        </table>
                        <div class="row mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team End -->





@endsection
