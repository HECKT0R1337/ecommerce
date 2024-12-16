{{-- @if (Session::has('error'))
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
@endif --}}





{{--
 @if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ $error }}",
                showConfirmButton: false,
                timer: 3000 // Auto-hide after 3 seconds
            });
        @endforeach
    </script>
@endif

 @if ($errors->any())
<script>
    Swal.fire({
        title: 'Validation Error!',
        icon: 'error',
        html: `
            <ul style="text-align: left; color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
    });
</script>
@endif 

@if (session('success'))
 <script>
     Swal.fire({
         title: 'Success!',
         text: "{{ session('success') }}",
         icon: 'success',
         confirmButtonText: 'OK'
     });
 </script>
@endif

@if (session('error'))
 <script>
     Swal.fire({
         title: 'Error!',
         text: "{{ session('error') }}",
         icon: 'error',
         confirmButtonText: 'OK'
     });
 </script>
@endif
--}}