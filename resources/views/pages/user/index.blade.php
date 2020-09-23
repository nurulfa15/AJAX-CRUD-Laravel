@extends('layouts.app')

@section('content')
<div class="card" style="margin-top:70px">
  <div class="card-header">
    <h3 class="card-title">Datatable
      <a href="{{ route('user.create') }}" class="btn btn-success float-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i> Create</a>
    </h3>
  </div>
  <div class="card-body">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

        </tbody>

    </table>

  </div>
</div>

@endsection

@push('script')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.user') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush
