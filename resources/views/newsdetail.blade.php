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
        .img{
          line-height: 80vh;
        }
        img {
          height: 100vh;
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
            <a class="navbar-brand" href="#"> <img style="max-width:100%;height: 50px;"
                    src="{{asset('img/Louis_Vuitton_logo_and_wordmark.svg.png')}}" alt=""> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <h2 class="">Chi tiết tin tức</h2>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>

    <div class="product container">
     
        <div class="row">
@foreach($data as $t)
            <div class="col-6 border img">
             
                <img src="{{ asset('storage/img/'.$t->TT_HINHANH) }}" alt="">
            </div>
            <div class="col-6">

                <div class="content">
                    <h3>{{$t->TT_TEN}}</h3>
                
                  
               
               
                 
               
                  
               
                  
                  <!-- Modal -->
                  
                
                
                        
                   
                   
                    
                  
                    
                  
                </div>
                <div class="content-1">
                    <h5>Thông tin chi tiết :</h5>
                    <div><span>
                       
                         {{$t->TT_NOIDUNG}}</span></div>
                </div>
                <div class="content-1">
             
                   
                 
                
                      
                      <!-- Modal -->
                     
                    
                </div>
            </div>
@endforeach
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    
</body>

</html>
