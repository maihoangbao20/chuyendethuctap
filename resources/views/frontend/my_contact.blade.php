@extends('layouts.site')
@section('title', 'EStore - Tin nhắn của tôi')
@section('content')

<body>
    @include('frontend.header')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ url('contact') }}">Liên hệ</a></li>
                <li class="breadcrumb-item active">Tin nhắn của tôi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <!-- Contacts Start -->
    <div class="contacts">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Tin nhắn của tôi</h2>
                    @if($contacts->isEmpty())
                        <p>Chưa có tin nhắn nào.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Chủ đề</th>
                                    <th>Ngày gửi</th>
                                    <th>Nội dung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->title }}</td>
                                        <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                                        <td>{{ $contact->content }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Contacts End -->

    @include('frontend.footer')
</body>
@endsection
