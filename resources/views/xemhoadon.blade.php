<div style="margin-top:67px;" >
  <div class="row">
     
  <div class="col-3">
  
  <div class="row">
    
  <div class="col-6"><form action="{{route('export_hoadon')}}" method="POST">
    @csrf
  <input type="submit" value="Xuất Excel" name="export_csv" class="btn btn-success">
  </form></div>
  </div>
  </form>
  </div>
    
    <div class="col-6">
      <div class="row">
        <div class="col-6">
    
  
    </div>
    <div class="col-6">
      <div class="input-group">
        <form action="{{route('admin.bill.adminbill')}}" method="get">
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
            <th>Mã hóa đơn</th>
            <th>Thành tiền(VND)</th>
            <th>Mã khách hàng</th>
            <th>Trạng thái</th>
            <th>Ghi chú</th>
        </tr>
    </thead>
    <tbody>
     
      @foreach ($bill as $data)
          
      
        <tr>
            <td>{{++$i}}</td>
            <td>{{$data->HD_MA}}</td>
            <td>{{number_format($data->HD_THANHTIEN)}}</td>
            <td>{{$data->KH_MA}}</td>
            <td>{{$data->TT_MA}} </td>
            <td>{{$data->HD_GHICHU}} </td>
        </tr>
       
      @endforeach  
       
    </tfoot>
    
</table>
{{$bill->links()}}