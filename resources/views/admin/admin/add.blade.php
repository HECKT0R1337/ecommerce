@extends('admin.layouts.app')
@section('style')
@endsection


@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4 mt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Add New Admin</div>
                        </div>
                        <form action="{{ route('admin.create') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3"> <label for="inputemail" class="form-label">Email
                                        address</label>
                                    <input type="email" name='email' value="{{ old('email') }}" class="form-control"
                                        id="inputemail" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                        We'll never share your email with anyone else.
                                    </div>
                                    <div class="form-text" style="color:red">{{ $errors->first('email') }}
                                    </div>
                                </div>

                                <div class="mb-3"> <label for="inputname" class="form-label">name</label>
                                    <input type="text" name='name' value="{{ old('name') }}" class="form-control"
                                        id="inputname" aria-describedby="nameHelp">
                                    <div class="form-text" style="color:red">{{ $errors->first('name') }}</div>
                                </div>

                                <div class="mb-3"> <label for="InputPassword" class="form-label">Password</label>
                                    <input type="password" name='password' class="form-control" id="InputPassword">
                                    <div class="form-text" style="color:red">{{ $errors->first('password') }}

                                    </div>
                                </div>
                                <div class="card-footer"> <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
@endsection
