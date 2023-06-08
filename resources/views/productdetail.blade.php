<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            font-family: "Roboto", sans-serif;
            box-sizing: border-box;
        }

        .navbar {

            color: white !important;
            width: 100%;
            display: block;
            background-color: whitesmoke;
            box-shadow: 0 0 15px rgba(0, 0, 0, .5);
            border-bottom: 1px solid whitesmoke;
            z-index: 99;
        }
        .nav-link {
            color: white;
        }

        a {
            text-decoration: none;
            list-style-type: none;
        }

        .col-6 {
            height: 87vh;
        }
        img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }
        .content {
            margin-top: 20px;
          margin-bottom: 10px;
        }

        .border-right{
         background-color: rgb(162,161,160);
           
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm " style="background-image: url({{asset('img/172226.jpg')}}); ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('product')}}"> <img style="max-width:100%;height: 50px;"
                    src="{{asset('img/Louis_Vuitton_logo_and_wordmark.svg.png')}}" alt=""> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <h2 class="">Chi tiết sản phẩm</h2>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>

    <div class="product container">

        <div class="row">

            <div class="col-6 border">
               <?php $data  ?>
                <img src="{{ asset('storage/img/'.$data->SP_ANH) }} " alt="">
            </div>
            <div class="col-6">

                <div class="content">
                    <h3>{{$data->SP_TEN}}</h3>
                    <p>Thương hiệu: Louis Vutton</p>
                    <p>Tình trạng: Còn hàng</p>
                    <p >Giá: <span style="font-weight:700;">{{number_format($data->SP_GIA)}}₫ </span></p>
                 @if (!empty(session('sdtkhachhang')))
                 
                 @if($ketquadanhgia==1)
               
                  <div id="rateYo" style="display:inline-block ;">
                    @elseif($ketquadanhgia==3)
                    <div id="rateYo3" style="display:inline-block ;">
              @else
                 <div id="rateYo2" style="display:inline-block ;">

               
@endif

                   
                 </div>
                 
                 <svg data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:black;vertical-align: -webkit-baseline-middle;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 32 32">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  </svg>
                  
               
                  
                  <!-- Modal -->
                  <div class="modal" style="top:0 ;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Đánh giá</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nội dung</label>
                                <textarea class="form-control" id="message"></textarea>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Lưu</button>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                 <form action="{{route('danhgia')}}" method="post" id="formrating">
                    @csrf
                    <input class="form-controll" type="hidden" name="id_message" id="id_message" >
                       <input class="form-controll" type="hidden" name="id_rateyo" id="id_rateyo" >
                       <input class="form-controll" type="hidden" name="product" value="{{$data->SP_MA}}" >
                       <input class="form-controll" type="hidden" name="khachhang" value="{{session('sdtkhachhang')}}" >
                </form>
                 @else
                 <div id="rateYo1">
                    
                
                   
                
                </div> 
                 @endif
                        
                   
                   
                    
                 <form action="{{route('cart')}}" method="post">  
                  @csrf
                  <input type="hidden" value="{{$data->SP_MA}}" name="masp">
   <input type="submit"  class="btn btn-secondary" value="Đặt hàng">
                </form>
                    
                    
                </div>
                <div class="content-1">
                    <h5>Thông tin chi tiết :</h5>
                    <div><span>
                       
                      {{$data->SP_MOTA}}</span></div>
                </div>
                <div class="content-1">
             
                   
                 
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn btn-primary">Xem đánh giá</button>
                   
                      
                      <!-- Modal -->
                      <div class="modal" style="top:0 ;" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
<h3 style="color:white;">Đánh giá</h3>
                          <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-12">
                              <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                <div class="card-body p-1">
                               
                                  
                                  @if($danhgia==null)
                                  <h3>Đánh giá trống</h3>
                                                                          @endif
                                  @foreach($danhgia as $danhgia)
                                  
                                  <div class="card">
                                    <div class="card-body">
                                      <p class="h4">{{$danhgia->TK_SDT}}</p>
                                   
                                    @for($i=0 ;$i<$danhgia->DG_SAO;$i++)
                                  
                                    <span class="fa fa-star checked" style="color:orange">  </span>
                                    @endfor
                                    @for($i=0 ;$i<5-$danhgia->DG_SAO;$i++)
                                  
                                    <span class="fa fa-star checked" style="color:blue">  </span>
                                    @endfor
                                    {{$danhgia->DG_SAO}}
                                    <span>{{$danhgia->DG_COMMENT}}</span>
                                      <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
    
                                     
                                        </div>
                                    
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                          
                                  
                          
                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
   $(function () {

$("#rateYo").rateYo(
{    
    fullStar: true
}
).on("rateyo.set", function (e, data) {
              var rating = data.rating;
              var myInput = document.getElementById("message").value;
             $('#id_rateyo').val(rating);
             $('#id_message').val(myInput);
             $('#formrating').submit();
            });
            $("#rateYo1").rateYo(
{ 
  fullStar: true   
}
).on("rateyo.set", function (e, data) {
             alert("Bạn chưa đăng nhập để đánh giá");
            });      
            $("#rateYo2").rateYo(
{ 
  fullStar: true   
}
).on("rateyo.set", function (e, data) {
             alert("Bạn chưa mua để đánh giá");
            });  

            $("#rateYo3").rateYo(
{ 
  fullStar: true   
}
).on("rateyo.set", function (e, data) {
             alert("Bạn đã đánh giá");
            });  
});
      </script>
</body>

</html>
