@extends('frontend.layouts.panel')

@section('js.up')
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <div class="mt-2 mb-2">
        <div class="row">
            <div class="col-md-12">
                <h2>User</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="datatables" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js.bottom')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $.noConflict();
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('user.getAll') }}',
            columns: [
                { data: 'name',name: 'name'},
                { data: 'email',name: 'email'},
            ]
        });
    });
</script>
@endsection