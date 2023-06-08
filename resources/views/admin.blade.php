<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản trị</title>
  <script src="https://kit.fontawesome.com/3cf6918e55.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <style type="text/css">
    * {
      padding: 0;
      margin: 0;
      font-family: sans-serif;
      box-sizing: border-box;
    }
    body{
      position: relative ;
    }
img{
  height: 30px;
}
    .navbar {
      position: fixed;
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

    .col-2 {
      height: 100vh;
      background-color: rgb(79, 93, 115);
    }
td{
  height: 40px;
  line-height: 40px;
}

    .col-10 {
      height: 100vh;
      background-color: whitesmoke;
    }
  </style>
</head>

<body >
  <nav class="navbar navbar-expand-sm "style=" background-image: url('{{asset('img/172226.jpg')}}') !important;" >
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('admin')}}"> <img style="max-width:100%;height: 50px;"
          src="./img/Louis_Vuitton_logo_and_wordmark.svg.png" alt=""> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <h2 class="">Trang quản trị</h2>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        
        <div class="card" style="margin-top:70px;">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{route('admin.product.adminproduct')}}">Sản phẩm</a> </li>
            <li class="list-group-item"><a href="{{route('admin.bill.adminbill')}}">Hóa đơn</a></li>
            <li class="list-group-item"><a href="{{route('admin.vnpay.adminvnpay')}}">Vnpay </a></li>
            <li class="list-group-item"><a href="{{route('admin.detailbill.admindetailbill')}}">Chi tiết hóa đơn </a></li>
            <li class="list-group-item"><a href="{{route('admin.contact.admincontact')}}">Liên hệ</a></li>
            <li class="list-group-item"><a href="{{route('admin.coupon.admincoupon')}}">Giảm giá</a></li>
            <li class="list-group-item"><a href="{{route('admin.news.adminnews')}}">Tin tức</a></li>
            <li class="list-group-item"><a href="{{route('admin.user.adminuser')}}">Tài khoản</a></li>
            <li class="list-group-item"><a href="{{route('admin.binhluan.adminbinhluan')}}">Bình luận</a></li>
            <li class="list-group-item"><a href="{{route('admin.thongke.adminthongke')}}">Thống kê</a></li>
            <li class="list-group-item"><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
          </ul>
        </div>
       
      </div>
      <div class="col-10">
        
        @include($data['page'])
           
          
          
        </div>
      </div>

    </div>

  </div>
  <script>
    @isset($mangten)
    var xValues =[@php echo $mangten ; @endphp];
    var yValues = [@php echo $mang ; @endphp];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: ""
        }
      }
    });

   
   
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("bar", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: ""
    }
  }
});
@endisset
    </script>
</body>

</html>