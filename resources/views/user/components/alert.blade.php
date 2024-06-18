@if ($success = session('success'))
    <script>
        Swal.fire(
            'Thông báo',
            '{{$success}}',
            'success',
        )
    </script>
@elseif ($warning = session('warning'))
    <script>
        Swal.fire(
            'Cảnh báo',
            '{{$warning}}',
            'warning',
        )
    </script>
@elseif ($error = session('error'))
    <script>
        Swal.fire(
            'Lỗi',
            '{{$error}}',
            'error',
        )
    </script>
@elseif ($info = session('info'))
    <script>
        Swal.fire(
            'Thông báo',
            '{{$info}}',
            'info',
        )
    </script>
@endif
@error('password')
<script>
    Swal.fire(
        'Lỗi',
        '{{$message}}',
        'error'
    )
</script>
@enderror
@error('username')
<script>
    Swal.fire(
        'Lỗi',
        '{{$message}}',
        'error'
    )
</script>
@enderror
@error('email')
<script>
    Swal.fire(
        'Lỗi',
        '{{$message}}',
        'error'
    )
</script>
@enderror
@error('name')
<script>
    Swal.fire(
        'Lỗi',
        '{{$message}}',
        'error'
    )
</script>
@enderror
@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: '{{ session('error') }}'
        });
    </script>
@endif

@if ($errors->has('phone'))
    <script>
        Swal.fire(
            'Lỗi',
            '{{ $errors->first('phone') }}',
            'error',
        )
    </script>
@endif
@push('scripts')
    <script>
        setTimeout(() => {
          $('#alerts').addClass("d-none")
        },4000);
    </script>
@endpush
