
<div style="margin-top:67px;" >
  <div class="row">
     
  
    
    <div class="col-3">
      
      <a href="{{route('admin.contact.add')}}" class="btn btn-primary">Thêm liên hệ</a>
    </div>
    </div>
  </div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
<th>STT</th>
            <th><span>Địa chỉ</span></th>
            <th><span>Số điện thoại</span></th>
            <th><span>Email</span></th>
            <th><span>Facebook</span></th>
        <th>&nbsp;</th>
            
        </tr>
    </thead>
    <tbody>
      @php
       $i=1 ;   
      @endphp
      @foreach ($data['data'] as $data)
        <tr>
         <td>{{$i}}</td>
            <td>{{$data->LH_DIACHI}}</td>
            <td>{{$data->LH_EMAIL}}</td>
            <td>{{$data->SP_MOTA}}</td>
            <td>{{$data->SP_ANH}}</td>
            <td><a href="contact/delete/{{$data->LH_MA}}"><i class="far fa-trash-alt"></i></a></td>
        </tr>
        @php $i++ @endphp
        @endforeach
       
        
       
    </tfoot>
</table>
