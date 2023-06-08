<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;

        }

        .header {
            background-image: url("img/172226.jpg");
            background-size: cover;
            width: 100%;
            height: 100vh;
            position: relative;
        }
.modal{
    z-index: 9999999;
}
        .navbar {
            color: white !important;
            width: 100%;
            display: inline;
            position: fixed;
            box-shadow: 0 0 15px rgba(0, 0, 0, .5);
            border-bottom:1px solid whitesmoke;
           background-color: rgba(0, 0, 0, 0.3);
            z-index: 99;
        }

        #demo {
            z-index: 1;
            height: 100vh;
        }

        #demo video {

            height: 100vh;
        }

        .carousel-caption {
            color: #333;
        }

        .carousel-control-prev,
        carousel-control-next {
            color: #333;
        }
       ul>li> a {
            color: white !important;
        }

        .content {
            background-size: cover;
            margin-bottom: 10px;
        }
.product{
  
    background-size: cover;
}
        .footer,.sanphamnoibat {
            background-image: url("img/172226.jpg");
         margin: auto;
            width: 100%;
        }
       .sanphamnoibat{
        color: white;
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
    <?php
   
 


    ?>
    <div class="header">
        <nav class="navbar navbar-expand-sm ">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}"> <img style="max-width:100%;height: 50px;" src="./img/Louis_Vuitton_logo_and_wordmark.svg.png" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span style="color:white;" class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto ">
                        <li class="nav-item">
                            <a class="nav-link" href="product">Sản phẩm</a>
                        </li>
                        @if(Session('sdtkhachhang'))

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dangxuat')}}">Đăng Xuất</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="login">Đăng nhập</a>
                        </li>
@endif
                     
                    </ul>
                   <div class="d-flex">
             
                  <div class="modal" style="top:0 ;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  @if (isset($tenkhachhang))
                       <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" name="submit" >{{$tenkhachhang}}</button>
                 
                @else

               
                  @endif
                   </div>
                </div>
            </div>
        </nav>

        <div id="demo" class="carousel slide container-fluid" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                  
                    <video src="{{ asset('img/wcsS2e2eDs_HD.mp4') }}" class="d-block" style="width: 100%;" autoplay muted
                        loop></video>
                    <!-- <img src="https://www.w3schools.com/bootstrap5/chicago.jpg" alt="Los Angeles" class="d-block" style="width:100%"> -->
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <video src="./img/WWnNaQyDN9_HD.mp4" class="d-block" style="width: 100%;" autoplay muted
                        loop></video>
                    <!-- <img src="https://www.w3schools.com/bootstrap5/chicago.jpg" alt="Los Angeles" class="d-block" style="width:100%"> -->
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <video src="./img/i6i2rlsWHY_HD.mp4" class="d-block" style="width: 100%;" autoplay muted
                        loop></video>
                    <!-- <img src="https://www.w3schools.com/bootstrap5/chicago.jpg" alt="Los Angeles" class="d-block" style="width:100%"> -->
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!-- Left and right controls/icons -->

    </div>
    
    {{-- <div style="height: auto;" class="content container-fluid ">
        <div class="row">
            <div style="background-color: whitesmoke;" class="col-6">

                <img src="./img/Valentines_Day_23_HP_DI3.jpg" style="width: 100%;" alt="">
            </div>
            <div class="col-6" style="background-color: whitesmoke">
                <h2>Lorem ipsum dolor sit </h2>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quaerat sapiente dolores modi doloribus eos optio, soluta totam ea ipsum ullam commodi accusantium ab molestias asperiores, obcaecati, sunt exercitationem voluptatibus?</span>
            </div>


        </div>
    </div>
    <div style="height: auto;" class="content container-fluid ">
        <div class="row">
            <div style="background-color: whitesmoke;" class="col-6">

                <img src="./img/Valentines_Day_23_HP_DI3.jpg" style="width: 100%;" alt="">
            </div>
            <div class="col-6" style="background-color: whitesmoke">
                <h2>Lorem ipsum dolor sit </h2>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quaerat sapiente dolores modi doloribus eos optio, soluta totam ea ipsum ullam commodi accusantium ab molestias asperiores, obcaecati, sunt exercitationem voluptatibus?</span>
            </div>


        </div>
    </div>
    <div style="height: auto;" class="content container-fluid ">
        <div class="row">
            <div style="background-color: whitesmoke;" class="col-6">

                <img src="./img/Valentines_Day_23_HP_DI3.jpg" loading="lazy" style="width: 100%;" alt="">
            </div>
            <div class="col-6" style="background-color: whitesmoke">
                <h2>Lorem ipsum dolor sit </h2>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quaerat sapiente dolores modi doloribus eos optio, soluta totam ea ipsum ullam commodi accusantium ab molestias asperiores, obcaecati, sunt exercitationem voluptatibus?</span>
            </div>


        </div>
    </div>
     --}}
     <div style="text-align: center;" class="col-12">
        <H2>Tin tức</H2>
     </div>
     <div class="container">
     <div class="row row-cols-3">
        @foreach($news as $news) 
<div class="col"> <div class="card" style="">
    <img src="{{asset('storage/img/'.$news->TT_HINHANH)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h6 class="card-title">{{$news->TT_TEN}} <span style="font-weight: 800;" class="badge bg-danger" ></span></h6>
     
      <a href="detailnews/{{$news->TT_MA}}" class="btn btn-primary">Xem chi tiết</a>
      
    </div>
  </div></div>
  @endforeach
 
     </div>
    </div>
     
    <div class="product">


<div class="container">
    <div class="row">

<div style="text-align: center;" class="col-12">
   <H2>Túi xách</H2>
</div>

        
    </div>
    <div class="row row-cols-4">
        <?php
  
   foreach ($tuixach as $key => $value) {
    
   
   ?>
      <div class="col">
        <div class="card">
        <img class="card-img-top" src="{{asset('storage/img/'.$value->SP_ANH)}}" loading="lazy" alt="Card image cap">
      <div class="card-body">
        <div class="row">
            <div class="col-12" style="height:52px;">
                <h6 class="card-title" style="color:#333;"><a style="text-decoration:none;color:#333;" href="detail/{{$value->SP_MA}}">{{$value->SP_TEN}} </a></h6>
         </div>
        
        </div>
      
        <div class="row">
           
            <div class="col-8">
                <p class="card-text"  style="font-weight: 800;color:#d80d0d;">{{number_format($value->SP_GIA)}} ₫</p>
               
            </div>
           
           
           </div>
      
      </div>

    </div></div>
    

    <?php  } ?>
</div>
<div class="row">

    <div style="text-align: center;" class="col-12">
       <H2>Sản phẩm mua nhiều</H2>
    </div>
    
            
        </div>
<div class="row row-cols-4">
    <?php
foreach ($bestsale as $key => $value) {


?>
  <div class="col">
    <div class="card">
    <img class="card-img-top" src="{{asset('storage/img/'.$value->SP_ANH)}}" loading="lazy" alt="Card image cap">
  <div class="card-body">
    <div class="row">
     <div class="col-12" style="height:52px;">

        <h6 class="card-title" style="color:#333;"><a style="text-decoration:none;color:#333;" href="detail/{{$value->SP_MA}}">{{$value->SP_TEN}} </a></h6>
     </div>
    
    </div>
    <div class="row">
        <div class="col-8">
            <p class="card-text" style="font-weight: 800;color:#d80d0d;">{{number_format($value->SP_GIA)}} ₫</p>
        </div>
      
       
       </div>
  
  </div>

</div></div>


<?php  } ?>
</div>




</div>
    <div class="footer container-fluid">
        <div class="row">

            <div class="col-12" style="height: 25px; text-align: center;">
                <span style="font-weight: bolder;">LOUIS VUTTION</span>


            </div>
          


        </div>


    </div>


    </div>
</body>

</html>
