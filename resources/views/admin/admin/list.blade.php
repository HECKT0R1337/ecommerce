@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Admin List</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class='mb-2' style="text-align: right">
                    <a href="{{ route('admin.add') }}" class='btn btn-primary'>Add New Admin</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Admin List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr class="align-middle">
                                                <td>{{ $admin->id }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->is_admin == 1 ? 'is Admin' : 'Not Admin' }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form action="{{route('admin.delete',$admin->id)}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger delete-btn"
                                                        {{-- onclick="return confirm('Are you sure you want to delete this?')"     --}}
                                                        >
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <div style="padding:10px; float:right;">
                                    {{!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}}
                                </div> --}}
                                {!! $admins->withQueryString()->links('pagination::bootstrap-5') !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
$(function(){
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        alert('hello');
        var id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form-'+id).submit();
            }
        });
    });
});
</script>


@section('script')
@endsection
