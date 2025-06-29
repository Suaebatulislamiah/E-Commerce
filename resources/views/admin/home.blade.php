@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Dashboard</h1>
</div>
        <h1>Home</h1>
        <p>Selamat datang, <strong>{{ $user->name }}</strong></p>
        <p>Email: {{ $user->email }}</p>
        <p>Role: 
            @foreach ($user->getRoleNames() as $role)
                <span>{{ $role }}</span>
            @endforeach
        </p>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @endsection

