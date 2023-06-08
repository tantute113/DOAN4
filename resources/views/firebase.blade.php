<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Phone Number Authentication using Firebase - ItSolutionStuff.com</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

</head>
<body>
  
<div class="container">
   {{-- @php
  $a= session()->get('TEN_REGISTER');
$b =session()->get('MATKHAU_REGISTER');
$c=session()->get('DIACHI_REGISTER');
$d =session()->get('SDT_REGISTER');

dd($a.$b.$c.$d) ;
   @endphp --}}
  
    <div class="alert alert-danger" id="error" style="display: none;"></div>
  
    <div class="card">
      <div class="card-header">
        Enter Phone Number
      </div>
      <div class="card-body">
  
        <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
  
        <form>
          @csrf
            <label>Phone Number:</label>
            <input type="text" disabled id="number" value="{{$name}}" class="form-control">
            <div id="recaptcha-container"></div>
            <button type="button" class="btn btn-success" onclick="phoneSendAuth();">SendCode</button>
        </form>
      </div>
    </div>
      
    <div class="card" style="margin-top: 10px">
      <div class="card-header">
        Enter Verification code
      </div>
      <div class="card-body">
  
        <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
  
        <form>
            <input type="text"  id="verificationCode" class="form-control" placeholder="Enter verification code">
            <button type="button" class="btn btn-success" onclick="codeverify();">Verify code</button>
  
        </form>
      </div>
    </div>
  
</div>
  
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js">

</script>
<script>
                
      
     

      
  var firebaseConfig = {
    apiKey: "AIzaSyAJ_6qcn2QeMpravG5Kg2okDtwSgXSA4tQ",
  authDomain: "otp-sms-98a7e.firebaseapp.com",
  projectId: "otp-sms-98a7e",
  storageBucket: "otp-sms-98a7e.appspot.com",
  messagingSenderId: "234512692110",
  appId: "1:234512692110:web:a0a9eca0948a172e08eadf",
  measurementId: "G-JHS3R8NT0B"
  };
    
  firebase.initializeApp(firebaseConfig);

  
    window.onload=function () {
      render();
    };
  
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
  
    function phoneSendAuth() {
           
        var number = $("#number").val();
          
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
              
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
  
            $("#sentSuccess").text("Gửi thành công.");
            $("#sentSuccess").show();
              
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
  
    }
    function codeverify() {
  
        var code = $("#verificationCode").val();
         
        coderesult.confirm(code).then(function (result) {
            var user=result.user;
            console.log(user);
  
            $("#successRegsiter").text("Đăng ký thành công.");
            $("#successRegsiter").show();
            $value = $('#number').val();
                $.ajax({
                    type: 'get',
                    url: '{{ route('firebase.luu') }}',
                    data: {
                        'search': $value
                    },
                    error: function(e) {
        // Hàm được thực thi khi có lỗi xảy ra trong quá trình gửi request hoặc nhận kết quả từ server
        alert('Có lỗi xảy ra'+e.message);
    }
                });
                
                $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                // window.location.assign("/register");

        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
  
</script>

  
</body>
</html>