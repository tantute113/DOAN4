<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
            background-image: url("img/172226.jpg");
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

        .btn-cart {

            width: 30px;

        }

        img,
        svg {
            vertical-align: middle;
        }

        input {
            text-align: center;
        }

        .container {
            background-color: #DDDDDD;
            height: 100vh;
        }

        .col-9,.col-3{
            margin-top: 20px;
        }
        .thanhtoan
        {
           
            background-color: white;
        }
        .thanhtoan-h3{
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img style="max-width:100%;height: 50px;"
                    src="./img/Louis_Vuitton_logo_and_wordmark.svg.png" alt=""> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <h2 class="">Giỏ hàng</h2>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
    <div class="row table-container">
       
        <div class="col-9">
            @if ($errors->any())
            <div style="" class="alert alert-danger">
                
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
               
            </div>
        @endif
        
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody> 
                    {{-- @php
                        print_r($data['cart']);
                    @endphp --}}
                    @foreach($data['cart'] as $t)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                               
                                <img src="{{ asset('storage/img/'.$t->options->img) }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    {{-- <p class="fw-bold mb-1">{{$t->name}}</p> --}}
                                    {{-- <p class="text-muted mb-0">john.doe@gmail.com</p> --}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{$t->name}}</p>
                            
                        </td>

                        <td>
                            <div class="cart-button">
                                <a href="/cart/reduce/{{$t->rowId}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                                </a>
                                <input value="{{$t->qty}}" class="btn-cart" type="text">
                                <a href="/cart/add/{{$t->rowId}}">
                                   
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-dash" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </a>
                            </div>

                        </td>
                        <td>
                            <a href="/cart/move/{{$t->rowId}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            
                            
                            </a>

                        </td>
                    </tr>
                  @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-3">
            <div class="thanhtoan">
                <div class="thanhtoan-h3" >

                    @if($errors->has('ten')) 
                    <span style="color: red ;"> {{ $errors->first('ten') }}</span>
                      @else
                    <span>Mã giảm giá :</span>
                    @endif
                    <form action="{{route('cart')}}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                   <input type="text" name="magiamgia" class="form-control" id="">
                </div><div class="col-4">
                   <input type="submit" class="form-control" value="Áp dụng" >
                   </div>
                </div>
                </form>
                  @php foreach ($data['cart'] as $t ) 
                    # code...
                   @endphp
                <p>Số lượng : {{$data['qty']}}</p>
                @if(isset($data['phantramgiamgia']))
                <p>Phần trăm giảm giá:{{$data['phantramgiamgia']}}  %</p>
                @endif
                @isset($del)
                Chưa giảm giá : <del>{{number_format($del)}}  VND</del>
                @endisset
                <p>Tổng tiền :{{number_format($data['total'])}}  VND</p>
             
                <div class="row">
                    <div class="col-4">
            <form action="{{route('cart.thanhtoan')}}" method="post">
                @csrf
  <input type="submit" value="Đặt hàng" class="btn btn-outline-secondary" value="">

            </form>
        </div>
        <div class="col-4">
            <form action="{{route('vnpay')}}" method="post">
                @csrf
                <input type="hidden" name="tongtien" value="{{$data['total']}}">
                <input type="submit" value="Vnpay" name="redirect"  class="btn btn-outline-secondary" >
             
                          </form>
                        </div>
<div class="col-4">
                {{-- <a href="{{route('cart.luugiohang')}}" class="btn btn-outline-secondary">Lưu</a> --}}
            </div>
                </div>  
        </div>
            </div>
        </div>

    </div>

</div>

</body>

</html>