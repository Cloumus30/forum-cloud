@extends('Layout.main')

@section('title')
    List-Pertanyaan | Forum-Cloud
@endsection

@section('body')
@if (count($pertanyaan))
    <div class="d-flex justify-content-between">
        <h1>List Pertanyaan</h1>
        <a href="#" class="btn btn-success" style="height: 60%;"><i class="bi bi-plus-square me-2"></i>Tanya</a>
    </div>
    
    <!-- CONTAINER QUESTION START -->
    <div class="container">
        <div class="row px-3">
        <x-pertanyaanComponent :pertanyaan="$pertanyaan"/>
        </div>
        
    </div>
    <!-- CONTAINER QUESTION END -->    
@else
    <h1>List Pertanyaan Anda</h1>
    <div class="info text-center">
        <h3>
            Anda Belum Memiliki Pertanyaan
        </h3>
    </div>
    <figure class="mx-auto d-block">
        <img src="./image/641_generated.jpg" alt="Image" class=" figure-img img-fluid mx-auto d-block" style="max-width: 50%;">
        <figcaption class="figure-caption text-center">
            <a class="link-dark" href="https://www.vecteezy.com/free-vector/discussion">Discussion Vectors by Vecteezy</a>
        </figcaption>
    </figure>
    <div class="text-center">
        <a href="Tanya.html" class="btn btn-primary btn-lg">Mulai Bertanya</a>    
    </div>
@endif




@endsection