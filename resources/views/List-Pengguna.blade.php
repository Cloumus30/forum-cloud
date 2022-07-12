@extends('Layout.main')

@section('title')
    User | Form-Cloud
@endsection

@section('body')
<h1>List Pengguna</h1>
                <div class="d-flex mt-4 flex-wrap">
                   <x-user-card :users="$users" />
                </div>
@endsection