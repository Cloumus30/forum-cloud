@foreach ($jawaban as $jawab)
<div class="row shadow p-3 mb-3 rounded {{($userId==$jawab->user_id) ? "bg-select" : "bg-body"}}">
    @if ($userId == $jawab->user_id)
        <div class="text-end">
            <a href="" class="btn btn-success text-end">Edit</a>
        </div>    
    @endif
    
    <div class="body-question ql-snow">
        <div class="ql-editor" style="white-space: pre-wrap">
          {!!$jawab->body!!}
        </div>
    </div>
    <div class="footer-card row justify-content-end">
        <div class="col-auto">
            By <a href="" class="text-decoration-none">{{$jawab->user->nama}} </a> 
            <span class="attribute-author">
              <strong>{{count($jawab->user->pertanyaan)}}</strong> Pertanyaan
            </span>  
            <span class="attribute-author">{{count($jawab->user->jawaban)}} Jawaban</span> 
        </div>
    </div>
      
</div>    
@endforeach
