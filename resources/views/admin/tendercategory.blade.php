@extends('admin.layout.master')
@section('content')

    <!---Category List -->


    <div class="container-fluid file_manager">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Tender Category List</h2>
                </div>
                @can('tendercategory-add')
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <a href="{{ route('admin.addtendercategoryshow') }}" type="button" class="btn btn-secondary">Add new</a>
                            </div>
                            <div class="p-2 d-flex">

                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
        <div class="row clearfix pt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2 class="font-weight-bold">Category List</h2>
                    </div>
                    <div class="body table-responsive">

                        <table class="table table-bordered data-table dt-responsive nowrap w-100" id="yajradb">
                            <thead id="sortable">
                                <tr>
                                    <th>SR. No.</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <!---Delet Model--->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center pt-4">
                    <h3>Delete Data</h3>
                    <p>Are you sure want to delete?</p>
                    <div class="mb-3">
                        <form action="{{ route('admin.deletetendercategory') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="Id" id="delId" />
                            <input type="hidden" name="column" id="delColumn" />
                            <input type="hidden" name="table" id="delTable" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                            <button type="submit" class="btn btn-danger">Yes, delete it!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('externaljs')
    <script type="text/javascript">
        $(function() {

            var table = $('#yajradb').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.tendercategory') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endsection