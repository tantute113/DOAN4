<div style="margin-top:67px;" >
  <div class="row">
      
  
    
    <div class="col-6">
      <div class="row">
        <div class="col-6">
   
  
    </div>
    <div class="col-6">
      <div class="input-group">
        <form action="{{route('admin.product.adminproduct')}}" method="get">
         {{-- <div>
        <input type="text" name="search" value="@php if(isset($_GET['search'])){echo $_GET['search'];}else{} @endphp" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
        <input type="submit" class="btn btn-outline-primary" value="Chọn">
      </div> --}}
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
            <th>Mã sản phẩm</th>
          
            <th>Giá(VND)</th>
            <th>Số lượng</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($detailbill as $item)
          
      
        <tr>
            <td>{{++$i}}</td>
            <td>{{$item->HD_MA}}</td>
            <td>{{$item->SP_MA}}</td>
            <td>{{number_format($item->CTHD_DONGIA)}}</td>
            <td>{{$item->CTHD_SOLG}} </td>
            
        </tr>
       
        @endforeach
       
    </tfoot>
</table>
{{$detailbill->links()}}
