<!-- QUESTION CARD START -->
@foreach ($pertanyaan as $pertan)
<div class="row shadow p-3 mb-3 bg-body rounded">
    
        
        <div class="title-question mb-2 d-flex justify-content-between">
            <a href="#" class="text-decoration-none">
                {{$pertan['judul']}}
            </a>
            <div>3 jawaban</div>
        </div>
        <div class="body-question">
            <p class="">
                {{$pertan['body']}}
            </p>
        </div>
        <div class="footer-card row justify-content-between">
            <div class="col-auto">
                <a href="#" class="badge bg-secondary text-decoration-none">PHP</a>
            </div>
            <div class="col-auto">
                By <a href="" class="text-decoration-none">{{$pertan['author']}} </a> 
                <span class="attribute-author">
                   <strong>600</strong> Pertanyaan
                </span>  
                <span class="attribute-author">30 Jawaban</span> 
            </div>
        </div>
    
</div>
<!-- QUESTION CARD END -->    
@endforeach
