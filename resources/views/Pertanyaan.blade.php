@extends('Layout.main')

@section('title')
    Pertanyaan | Forum-Cloud
@endsection

@section('body')
    <div class="d-flex justify-content-between">
        <h1>{{$pertanyaan->judul}}</h1>
        <a href="{{url('/pertanyaan-edit/'.$pertanyaan->id)}}" class="btn btn-success" style="height: 60%;"><i class="bi bi-pencil-square"></i> Edit</a>
    </div>
    
    <div class="ql-snow">
        <div class="ql-editor">
            {!!$pertanyaan->body!!}
        </div>
    </div>
    
    

@endsection