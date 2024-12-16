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



@push('js')
    
 {{-- @if ($errors->any())
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
@endif --}}


@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Validation Errors',
                icon: 'error',
                html: `
                    <div style="text-align: left; max-height: 200px; overflow-y: auto; padding: 10px;">
                        <ul style="list-style: none; padding-left: 0; margin: 0;">
                            @foreach ($errors->all() as $error)
                                <li style="
                                    padding: 8px 10px;
                                    margin-bottom: 5px;
                                    background: #f8d7da;
                                    color: #721c24;
                                    border-left: 5px solid #dc3545;
                                    border-radius: 4px;
                                    font-size: 14px;
                                ">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                `,
                showConfirmButton: true,
                confirmButtonText: 'Got it',
                confirmButtonColor: '#dc3545',
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                },
                width: '500px', // Adjust width
                padding: '1.5rem',
            });
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

@endpush
