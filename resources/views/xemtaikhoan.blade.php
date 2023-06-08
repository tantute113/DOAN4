<div style="margin-top:67px;" >
  <div class="row">
    
  <div class="col-3">
  
  <div class="row">
    
  <div class="col-6"><form action="{{route('export_taikhoan')}}" method="POST">
    @csrf
  <input type="submit" value="Xuất Excel" name="export_csv" class="btn btn-success">
  </form></div>
  </div>

  </div>
    
    <div class="col-6">
      <div class="row">
    
    <div class="col-6">
      <div class="input-group">
        <form action="{{route('admin.user.adminuser')}}" method="get">
          <div class="d-flex">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}else{} ?>" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
            <input type="submit" class="btn btn-primary" value="Chọn">
          </div>
      </form>
      </div>
    </div>
    
    </div>
    </div>
  
    </div>
  </div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên tài khoản</th>
            <th>Địa chỉ </th>
            <th>Số điện thoại</th>
            <th>Gmail</th>
            <th>Quyền</th>
            
        </tr>
    </thead>
    <tbody>
      @php $i=1 ; @endphp
      @foreach ($user as $item)
          
      
      
        <tr>
            <td>@php echo $i;$i++; @endphp</td>
          
            <td>{{$item->TK_TEN}}</td>
            <td>{{$item->TK_DIAC}}</td>
            <td>{{$item->TK_SDT}}</td>
            <td>{{$item->TK_GMAIL}}</td>
            @if($item->LOAI_MA==1)
            <td>Admin</td>
            @else
            <td>Khách hàng</td>
            @endif
            <td> 
              <a href="user/phanquyen/{{$item->TK_SDT}}">
          <i class="fa fa-edit"></i>
          </a>
          </td>
        </tr>
       
    @endforeach  
       
    </tfoot>
</table>
{{$user->links()}}
