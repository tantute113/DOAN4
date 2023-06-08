

<div class="container-fluid"> 

    <div style="margin-top:70px;" class="row row-cols-4" id="data_card">
        {{-- <div class="col" id="data-card">
          <div class="card">
            <img class="card-img-top" src="./img/louis-vuitton-túi-locky-bb--M44080_PM2_Front view.jpg"
              alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><a style="text-decoration:none;" href="detail/1">Cart Title</a></h5>
              <p class="card-text">10.000.000</p>
            <form action="cart" method="post">  
              @csrf
              <input type="hidden" value="74" name="masp">
    <input type="submit" style="width:100%;" class="btn btn-secondary" value="Mua">
            </form>
            </div>
    
          </div>
        </div> --}}
            
        
        <div class="col">
          <div style="height:100px;" class="card bg-blue">
            <div class="card-body">
            <div>

              <svg  style="color:deepskyblue;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
              <span style="font-size: 25px;font-weight:bolder; line-height:auto;">{{$taikhoan}}</span>
            </div>
            </div>
    
          </div>
        </div>
        <div class="col">
            <div style="height:100px;"  class="card">
              <div class="card-body">
                <svg  style="color:deepskyblue;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                  <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg>
                <span style="font-size: 25px;font-weight:bolder; line-height:auto;">{{$binhluan}}</span>
              </div>
      
            </div>
          </div>
    
          <div class="col">
            <div style="height:100px;"  class="card">
              <div class="card-body">
                <svg style="color:deepskyblue;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                </svg> 
                <span style="font-size: 25px;font-weight:bolder; line-height:auto;">{{$sanpham}}</span>
              </div>
      
            </div>
          </div>
    
          <div class="col">
            <div style="height:100px;"  class="card">
              <div class="card-body">
                <svg  style="color:deepskyblue;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                  <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                  <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z"/>
                
                </svg>
                <span style="font-size: 25px;font-weight:bolder; line-height:auto;">{{$hoadon}}</span>
              </div>
      
            </div>
          </div>
      </div>

    
      <canvas id="myChart" style="display: block; box-sizing: border-box; height: 411px; width: auto;" width="411" height="auto"></canvas>
</div>

