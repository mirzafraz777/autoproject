@extends('../layout.users')
@section('userContent')


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Withdrawls</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Sr#</th>
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                        <tbody>
                                @if($details && count($details) > 0)
                                        @foreach ($details as $withdrawal)
                                            <tr>
                                                <td>{{$withdrawal->id}}</td>
                                                <td>{{$withdrawal->bank_id}}</td>
                                                <td>{{$withdrawal->invoice}}</td>
                                                <td>{{$withdrawal->amount}}</td>
                                                <td>{{$withdrawal->status}}</td>
                                                <td>{{$withdrawal->message}}</td>
                                                <td>{{$withdrawal->updated_at->format('d-m-Y')}}</td>
                                                {{-- <td><a class="btn btn-sm btn-success" href="">View</a></td> --}}
                                            </tr>
                                        @endforeach
                                @else
                                        <tr>
                                            <td colspan="8">No withdrawals found.</td>
                                        </tr>
                                @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


@endsection
