<div style="margin-top:67px;" >
  <div class="row">
     
  <div class="col-3">
  
  <div class="row">
    
  <div class="col-6"><form action="{{route('export_vnpay')}}" method="POST">
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
            <th>Mã vnpay</th>
            <th>Thành tiền(VND)</th>
            <th>Ngân hàng</th>
            <th>Ghi chú</th>
            <th>Ngày</th>
            <th>Mã hóa đơn</th>
        </tr>
    </thead>
    <tbody>
     
      @foreach ($bill as $data)
          
    
        <tr>
            <td>{{++$i}}</td>
            <td>{{$data->id_vnpay}}</td>
            <td>{{number_format($data->vnp_amount)}}</td>
            <td>{{$data->vnp_bankcode}}</td>
            <td>{{$data->vnp_orderInfo}} </td>
            <td>{{$data->vnp_paydate}} </td>
            <td>{{$data->HD_MA}} </td>
        </tr>
       
      @endforeach  
       
    </tfoot>
    
</table>
{{$bill->links()}}