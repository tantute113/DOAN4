<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản phẩm</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    * {
      padding: 0;
      margin: 0;
      font-family:"Roboto",sans-serif;
    }

    .navbar {
      color: white !important;
      width: 100%;
      display: block;
      background-color: whitesmoke;
      background-image: url("img/172226.jpg");
      box-shadow: 0 0 15px rgba(0, 0, 0, .5);
      border-bottom: 1px solid whitesmoke;
      z-index: 99;
    }
    .nav-link:focus, .nav-link:hover {
    /* color: var(--bs-nav-link-hover-color); */
    color: white;
}
   .nav-link{
    color: white;
   }
    .product {

margin-top: 5px;

    }
   .card{
    -webkit-box-shadow: 6px 6px 4px 1px rgba(0,0,0,0.49); 
        box-shadow: 6px 6px 4px 1px rgba(0,0,0,0.49);margin-bottom: 20px;
    margin-bottom: 10px;
   }
    .col-2 {
      height: 100px;
    }

    .col-10 {
      height: auto;
      background-image: url("img/soclv.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
    .footer {
            background-image: url("img/172226.jpg");
         margin: auto;
            width: 100%;
        }
       
        .footer span {
            color: white !important;
        }
        .card{
            -webkit-box-shadow: 6px 6px 4px 1px rgba(0,0,0,0.49); 
        box-shadow: 6px 6px 4px 1px rgba(0,0,0,0.49);margin-bottom: 20px;
        }
        .modal-backdrop{
            top: auto !important;
        }
   
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-sm ">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}"> <img style="max-width:100%;height: 50px;"
          src="./img/Louis_Vuitton_logo_and_wordmark.svg.png" alt=""> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{route('product')}}">Sản phẩm</a>
          </li>
         
         
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="text" id="search" placeholder="Tìm kiếm">
         
        </form>
      </div>
    </div>
  </nav>
  <div class="product">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2" id="danhmuc">
          <div class="div">Loại sản phẩm</div>
          <ul class="list-group">
            <li class="list-group-item">
              <input class="form-check-input me-1 radio" id="tatca" type="radio" name="check" checked value="" aria-label="...">
           Tất cả
            </li>
            @foreach($danhmuc as $danhmuc)
          <li class="list-group-item">
            <input class="form-check-input me-1 radio" id="{{$danhmuc->DM_KEY}}" type="radio" name="check" value="{{$danhmuc->DM_MA}}" aria-label="...">
         {{$danhmuc->DM_TEN}}
          </li>
          
          @endforeach
          <li class="list-group-item">
            <input class="form-check-input me-1 radio" id="dathich" type="radio" name="check" value="10" aria-label="...">
         Giá cao đến thấp
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1 radio" id="dathich" type="radio" name="check" value="danhgia" aria-label="...">
         Sản phẩm đánh giá
          </li>
        </ul>
       {{-- <div class="div">Giá</div>
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" id="tatcagia" checked name="check2" type="radio" value="" aria-label="...">
           Tất cả giá
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" id="10tr" name="check2" type="radio" value="10-40->-<" aria-label="...">
        10 - 40 triệu
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" id="50tr" name="check2" type="radio" value="50-90->-<" aria-label="...">
           50 - 90 triệu
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" id="100tr" name="check2" type="radio" value="100-500->-<" aria-label="...">
         100 - 500 triệu
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" id="tren100tr" name="check2" type="radio" value="500-<" aria-label="...">
        Trên 500 triệu
          </li>
        </ul> --}}
      </div>
        <div class="col-10">
          <div class="container">
            <div class="row row-cols-4" id="data_card">
               @if ($product)
                  @php 
                 
                  @endphp
              
              @foreach ($product as $product)
                  
              
              <div class="col">
                <div class="card">
                  <img class="card-img-top" src="{{ asset('storage/img/'.$product->SP_ANH) }}"
                    alt="Card image cap">
                  <div class="card-body">
                    <h6 class="card-title"><a style="text-decoration:none;" href="detail/{{$product->SP_MA}}">{{$product->SP_TEN}} </a></h6>
                   
                   
                   
                    <div class="row">
                      <div class="col-8">
                        <p class="card-text"style="font-weight:700;color:#d80d0d;">{{number_format($product->SP_GIA)}}₫</p>
                      </div>
                      
                
                    </div>
                  <form action="{{route('cart')}}" method="post">  
                    @csrf
                    <input type="hidden" value="{{$product->SP_MA}}" name="masp">
     <input type="submit" style="width:100%;" class="btn btn-secondary" value="Mua">
                  </form>
                  </div>
                </div>
              </div>
      @endforeach
              @endif 
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){

    $('#search').on('keyup',function(){
                $value = $(this).val();
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'get',
                    url: '{{ route('product.timkiem') }}',
                    data: {
                        'search': $value,
                        '_token' :csrf_token
                    },
                    success:function(data){
                      $("#data_card").html(data);
                    }
                });
            })



    $('input[type="radio"]').on('click', function() {
      var checkedRadioInputs = document.querySelectorAll('input[type="radio"]:checked');
var selectedValues = [];

for(var i = 0; i < checkedRadioInputs.length; i++) {
  selectedValues.push(checkedRadioInputs[i].value);
}

console.log(selectedValues);
var value = selectedValues[0];
     var csrf_token = $('meta[name="csrf-token"]').attr('content');

  
     $.ajax({
            type: 'get',
            url: '{{ route('product.search') }}',
            data: {
                'search': value,
                '_token' :csrf_token

            },
            success:function(data){
             
        // Hiển thị dữ liệu trên trang
        
              $("#data_card").html(data);
          
            }
            , 
            error: function(e) {
        // Hàm được thực thi khi có lỗi xảy ra trong quá trình gửi request hoặc nhận kết quả từ server
        alert('Có lỗi xảy ra'+e.message);
    }
        });
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    });

//   function ajax_event(x,y)
//   {
//     $.ajax({
//             type: 'get',
//             url: '{{ route('product.search') }}',
//             data: {
//                 'search': x,
//                 '_token' :y

//             },
//             success:function(data){
//               $("#data_card").html(data);
          
//             }
//             , 
//             error: function (e) {
//                         console.log(e.message);
//                     }
//         });
//   }
//   $('#non').on('click',function(){
     
    
//      $value = $(this).val();
//      var csrf_token = $('meta[name="csrf-token"]').attr('content');

//      ajax_event($value,csrf_token);
//  });
//  $('#tatca').on('click',function(){
     
    
//      $value = $(this).val();
//      var csrf_token = $('meta[name="csrf-token"]').attr('content');

//      ajax_event($value,csrf_token);
//  });
//   $('#giaydep').on('click',function(){
     
    
//      $value = $(this).val();
//      var csrf_token = $('meta[name="csrf-token"]').attr('content');

//      ajax_event($value,csrf_token);
//  });
//  $('#tuixach').on('click',function(){
     
    
//      $value = $(this).val();
//      var csrf_token = $('meta[name="csrf-token"]').attr('content');

//      ajax_event($value,csrf_token);
    
//  });
//     $('#quanao').on('click',function(){
     
    
//         $value = $(this).val();
//         var csrf_token = $('meta[name="csrf-token"]').attr('content');

//         ajax_event($value,csrf_token);
//     });
//     $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
  });
</script>

</body>

</html>