@extends('Layout.main')

@section('title')
    Dashboard|Forum-Cloud
@endsection

@section('body')
    <h1>Dashboard</h1>
    <div class="container">

        <div class="row my-3 justify-content-around">
            <div class="col-lg-3">
                <!-- Card Start -->
                <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex justify-content-between">
                          <div class="align-self-center">
                            <i class="bi bi-question-circle-fill text-primary icon-card"></i>
                          </div>
                          <div class="media-body text-right">
                            <h3>{{$jumlahPertanyaan}}</h3>
                            <span>Pertanyaan</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card End -->
            </div>
            <div class="col-lg-3">
                <!-- Card Start -->
                <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex justify-content-between">
                          <div class="align-self-center">
                            <i class="bi bi-tags-fill icon-card text-success"></i>
                          </div>
                          <div class="media-body text-right">
                            <h3>{{$jumlahKategori}}</h3>
                            <span>Kategori</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card End -->
            </div>
            <div class="col-lg-3">
                <!-- Card Start -->
                <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex justify-content-between">
                          <div class="align-self-center">
                            <i class="bi bi-lightbulb-fill icon-card text-warning"></i>
                          </div>
                          <div class="media-body">
                            <h3>{{$jumlahJawaban}}</h3>
                            <span>Jawaban Anda</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card End -->
            </div>
        </div>

        <h3>List Pertanyaan</h3>

        <div class="row px-3">
            <x-pertanyaan-component :pertanyaan="$pertanyaanDashboard"/>
        </div>
        <div class="text-center mb-3">
            <a href="#" class="btn btn-primary">Selengkapnya</a>    
        </div>
    </div>
     
@endsection