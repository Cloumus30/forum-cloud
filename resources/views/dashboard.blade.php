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
                            <h3>278</h3>
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
                            <h3>278</h3>
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
                            <h3>278</h3>
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
            <!-- QUESTION CARD START -->
            <div class="row shadow p-3 mb-3 bg-body rounded">
                <div class="col-lg-1 col-md-2 col-sm-3 text-nowrap my-auto">
                    <div class="row mb-2">0 Vote</div>    
                    <div class="row">3 jawaban</div>
                </div>
                <div class="col-11">
                    
                    <div class="title-question mb-2">
                        <a href="#" class="text-decoration-none">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque magnam atque velit voluptates dolores aliquid excepturi fugiat quibusdam non! Dolorem harum esse corporis enim sunt iure? Adipisci voluptas, architecto nihil quam quaerat enim, consequatur delectus beatae, assumenda at ducimus aut. max font 30
                        </a>
                    </div>
                    <div class="body-question">
                        <p class="">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa dolor mollitia ipsam sint minus totam perferendis doloribus sunt sapiente labore, tempora aut est blanditiis consectetur fuga expedita repudiandae nostrum delectus ipsum, sed quidem placeat! Labore nobis explicabo facere, laudantium accusamus velit consequuntur, voluptatibus dicta officiis dignissimos dolor? Vitae, id dolorum? max 50
                        </p>
                    </div>
                    <div class="footer-card row justify-content-between">
                        <div class="col-auto">
                            <a href="#" class="badge bg-secondary text-decoration-none">PHP</a>
                        </div>
                        <div class="col-auto">
                            By <a href="" class="text-decoration-none">Cloudias Imani Pradana </a> 
                            <span class="attribute-author">
                               <strong>600</strong> Pertanyaan
                            </span>  
                            <span class="attribute-author">30 Jawaban</span> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- QUESTION CARD END -->
            <!-- QUESTION CARD START -->
            <div class="row shadow p-3 mb-3 bg-body rounded">
                <div class="col-lg-1 col-md-2 col-sm-3 text-nowrap my-auto">
                    <div class="row mb-2">0 Vote</div>    
                    <div class="row">3 jawaban</div>
                </div>
                <div class="col-11">
                    
                    <div class="title-question mb-2">
                        <a href="#" class="text-decoration-none">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque magnam atque velit voluptates dolores aliquid excepturi fugiat quibusdam non! Dolorem harum esse corporis enim sunt iure? Adipisci voluptas, architecto nihil quam quaerat enim, consequatur delectus beatae, assumenda at ducimus aut. max font 30
                        </a>
                    </div>
                    <div class="body-question">
                        <p class="">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa dolor mollitia ipsam sint minus totam perferendis doloribus sunt sapiente labore, tempora aut est blanditiis consectetur fuga expedita repudiandae nostrum delectus ipsum, sed quidem placeat! Labore nobis explicabo facere, laudantium accusamus velit consequuntur, voluptatibus dicta officiis dignissimos dolor? Vitae, id dolorum? max 50
                        </p>
                    </div>
                    <div class="footer-card row justify-content-between">
                        <div class="col-auto">
                            <a href="#" class="badge bg-secondary text-decoration-none">PHP</a>
                        </div>
                        <div class="col-auto">
                            By <a href="" class="text-decoration-none">Cloudias Imani Pradana </a> 
                            <span class="attribute-author">
                               <strong>600</strong> Pertanyaan
                            </span>  
                            <span class="attribute-author">30 Jawaban</span> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- QUESTION CARD END -->
            <!-- QUESTION CARD START -->
            <div class="row shadow p-3 mb-3 bg-body rounded">
                <div class="col-lg-1 col-md-2 col-sm-3 text-nowrap my-auto">
                    <div class="row mb-2">0 Vote</div>    
                    <div class="row">3 jawaban</div>
                </div>
                <div class="col-11">
                    
                    <div class="title-question mb-2">
                        <a href="#" class="text-decoration-none">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque magnam atque velit voluptates dolores aliquid excepturi fugiat quibusdam non! Dolorem harum esse corporis enim sunt iure? Adipisci voluptas, architecto nihil quam quaerat enim, consequatur delectus beatae, assumenda at ducimus aut. max font 30
                        </a>
                    </div>
                    <div class="body-question">
                        <p class="">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa dolor mollitia ipsam sint minus totam perferendis doloribus sunt sapiente labore, tempora aut est blanditiis consectetur fuga expedita repudiandae nostrum delectus ipsum, sed quidem placeat! Labore nobis explicabo facere, laudantium accusamus velit consequuntur, voluptatibus dicta officiis dignissimos dolor? Vitae, id dolorum? max 50
                        </p>
                    </div>
                    <div class="footer-card row justify-content-between">
                        <div class="col-auto">
                            <a href="#" class="badge bg-secondary text-decoration-none">PHP</a>
                        </div>
                        <div class="col-auto">
                            By <a href="" class="text-decoration-none">Cloudias Imani Pradana </a> 
                            <span class="attribute-author">
                               <strong>600</strong> Pertanyaan
                            </span>  
                            <span class="attribute-author">30 Jawaban</span> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- QUESTION CARD END -->
        </div>
        <div class="text-center mb-3">
            <a href="#" class="btn btn-primary">Selengkapnya</a>    
        </div>
    </div>
     
@endsection