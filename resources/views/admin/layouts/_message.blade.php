@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        Messge: {{ Session::get('error') }}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center" style="width:80%;" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif


@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        Messge: {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('payment-error'))
    <div class="alert alert-error" role="alert">
        Messge: {{ Session::get('payment-error') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        Messge: {{ Session::get('warning') }}
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info" role="alert">
        Messge: {{ Session::get('info') }}
    </div>
@endif

@if (Session::has('secondary'))
    <div class="alert alert-secondary" role="alert">
        Messge: {{ Session::get('secondary') }}
    </div>
@endif
