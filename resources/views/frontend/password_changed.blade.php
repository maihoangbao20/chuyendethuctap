<!-- resources/views/password_changed.blade.php -->

@extends('layouts.site')

@section('content')
@if (session('success'))
    <div class="modal fade show" id="passwordChangedModal" tabindex="-1" role="dialog" aria-labelledby="passwordChangedModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p id="passwordChangedModalMessage">{{ session('success') }} (<span id="passwordChangedModalTimer">5</span> giây)</p>
                </div>
                <div class="modal-footer">
                    <a id="passwordChangedModalLink" href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#passwordChangedModal').modal({ backdrop: 'static', keyboard: false });

        let timer = 5;
        const interval = setInterval(() => {
            timer--;
            document.getElementById('passwordChangedModalTimer').innerText = timer;
            if (timer <= 0) {
                clearInterval(interval);
                window.location.href = "{{ route('login') }}";
            }
        }, 1000);
    </script>
@endif
@endsection

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
