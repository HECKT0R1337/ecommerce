@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Product List</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class='mb-2' style="text-align: right">
                    <a href="{{ route('product.add') }}" class='btn btn-primary'>Add New Product</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Product List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">ID</th>
                                            <th>title</th>
                                            <th>Slug</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr class="align-middle">
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('product.edit', $value->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form action="{{ route('product.delete', $value->id) }}" method="POST"
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

                                {!! $getRecord->withQueryString()->links('pagination::bootstrap-5') !!}

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
