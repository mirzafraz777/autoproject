@extends('../layout.users')
@section('userContent')


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row justify-content-center g-4">
                    <div class="col-sm-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Bank Details</h6>
                            <form>
                                <div class="row mb-3">
                                    <label for="bankType" class="col-sm-2 col-form-label">Bank Type</label>
                                    <div class="col-sm-10">
                                        <select id="bankType" class="form-select mb-3"
                                            aria-label="Default select example">
                                            <option selected="">Select Bank Type</option>
                                            <option value="1">JazzCash</option>
                                            <option value="2">Easypaisa</option>
                                            <option value="3">Bank Account</option>
                                        </select>
                                    </div>
                                </div>
                                <div  id="bankDetails" class="d-block">
                                    <div class="row mb-3">
                                        <label for="bankName" class="col-sm-2 col-form-label">Bank Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bankName">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="accTitle" class="col-sm-2 col-form-label">Account Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="accTitle">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="accNumber" class="col-sm-2 col-form-label">Account Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="accNumber">
                                        </div>
                                    </div>
                                </div>
                                <div id="mobileNumberDetails" class="row mb-3 d-none">
                                    <label for="mobNumber" class="col-sm-2 col-form-label">Mobile No:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mobNumber">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->

             <!-- Bank Details Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Bank Details</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Bank  Type</th>
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">Acc Title</th>
                                    <th scope="col">Acc Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>Bank</td>
                                    <td>Mezan</td>
                                    <td>Jhon Doe</td>
                                    <td>PK1234947392749572</td>
                                    <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>Bank</td>
                                    <td>Bank Alfalah</td>
                                    <td>Jhon Doe</td>
                                    <td>PK1234947392749572</td>
                                    <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>JazzCash</td>
                                    <td>JazzCash</td>
                                    <td>Jhon Doe</td>
                                    <td>03221234567</td>
                                    <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>Easypaisa</td>
                                    <td>Easypaisa</td>
                                    <td>Jhon Doe</td>
                                    <td>03221234567</td>
                                    <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Bank Details End -->

           

@endsection