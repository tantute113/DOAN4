
<div style="margin-top:67px;" >
  <div class="row">
    
  
    
    <div class="col-3">
      
      <a href="{{route('admin.news.add')}}" class="btn btn-primary">Thêm tin</a>
    </div>
    </div>
  </div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th> <span>STT</span></th>
            <th><span>Tiêu đề</span></th>
            <th><span style="font-weight: 400;">Nội dung</span></th>
            <th>Hình ảnh</th>
            <th><span>Mã giảm giá</span></th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($data['data'] as $item)
          
    
        <tr>
            <td>1</td>
            <td>{{$item->TT_TEN}}Ư</td>
            <td>{{$item->TT_NOIDUNG}}</td>
          
            <td>{{$item->TT_HINHANH}} </td>
            <td>{{$item->MGG_MA}} </td>
            <td><a href="news/delete/{{$item->TT_MA}}"><i class="far fa-trash-alt"></i></a></td>
        </tr>
       @endforeach
        
       
    </tfoot>
</table>
