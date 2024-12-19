@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Category List</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class='mb-2' style="text-align: right">
                    <a href="{{ route('color.add') }}" class='btn btn-primary'>Add New Color</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Color List</h3>
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-end">
                                        <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                        <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                        <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>Color name</th>
                                            <th>Color code</th>
                                            <th>Added By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($catgs as $cat)
                                            <tr class="align-middle">
                                                <td>{{ $cat->id }}</td>
                                                <td>{{ $cat->name }}</td>
                                                <td>{{ $cat->code }}</td>
                                                <td>{{ $cat->created_by }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('color.edit', $cat->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form action="{{ route('color.delete', $cat->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger delete-btn"
                                                            {{-- onclick="return confirm('Are you sure you want to delete this?')"     --}}>
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    $(function() {
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
                    $('#delete-form-' + id).submit();
                }
            });
        });
    });
</script>


@section('script')
@endsection
