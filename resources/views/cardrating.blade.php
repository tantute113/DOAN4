@foreach ($data as $data)
<div class="col"> <div class="card">
    <img class="card-img-top" src="{{ asset('storage/img/'.$data->SP_ANH) }}"
      alt="Card image cap">
    <div class="card-body">
      <div style="height: 52px;" >
      <h6 class="card-title"><a style="text-decoration:none;" href="detail/{{$data->SP_MA}}">{{$data->SP_TEN}}</a></h6>
    </div>

    <div class="row">
      <div class="col-12">
          <div class="d-flex" style="margin-top:5px;">

              @for($i=0 ;$i<$data->total;$i++)
                            
              <i class="fa fa-star rating-color" style="color:yellow;"></i>
              @endfor
              @for($i=0 ;$i<5-$data->total;$i++)
            
              <i class="fa fa-star rating-color"></i>
              @endfor
           
              <h6 class="review-count">({{$data->countdanhgia}})</h6>
          </div>
      </div>
  </div>
      <div class="row">
      <div class="col-8">
        <p class="card-text" style="color:#d80d0d;font-weight:800;">{{number_format($data->SP_GIA)}}₫</p>
      </div>
      
    </div>
    
    <form action="{{route('cart')}}" method="post">  
    <input type="hidden" name="_token" value="{{$token}}" />
    <input type="hidden" value="{{$data->SP_MA}}" name="masp">
<input type="submit" style="width:100%;" class="btn btn-secondary" value="Mua">
    </form>
    </div>

  </div> </div>
  @endforeach
