<div style="margin-top:67px;" >
<div class="row">
    <div class="col-3">
  <form action="{{route('import_csv')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <input type="file" class="form-control" name="file" accept=".xlsx"><br>

  </div>
<div class="col-3">

<div class="row">
  <div class="col-6">
  <input type="submit" value="Nhập Excel" name="import_csv" class="btn btn-warning">
</div>
</form>
<div class="col-6"><form action="{{route('export_csv')}}" method="POST">
  @csrf
<input type="submit" value="Xuất Excel" name="export_csv" class="btn btn-success">
</div>
</div>
</form>
</div>
  
  <div class="col-6">
    <div class="row">
      <div class="col-6">
    <a href="{{route('admin.product.add')}}" class="btn btn-primary">Thêm sản phẩm</a>

  </div>
  <div class="col-6">
    <div class="input-group">
      <form action="{{route('admin.product.adminproduct')}}" method="get">
       <div>
       <div class="d-flex">
      <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}else{} ?>" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
      <input type="submit" class="btn btn-primary" value="Chọn">
    </div>
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
            <th><span>STT</span></th>
            <th><span>Ảnh </span></th>
            <th><span>Tên </span></th>
            <th><span>Giá(VND) </span></th>
            <th><span>Mô tả</span></th>
            <th><span>Danh mục</span></th>
           
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
      @php
       $i=1 ;   
      @endphp
      @foreach ($product as $data)
        <tr>
            <td>{{$i++}}</td>
            <td>
              <img class="img-circle"  style="object-fit:cover;" src="{{ asset('storage/img/'.$data->SP_ANH) }}" alt="">
              
              </td>
            <td>{{$data->SP_TEN}}</td>
            <td>{{number_format($data->SP_GIA)}}</td>
            <td>{{$data->SP_MOTA}}</td>
            <td>{{$data->DM_TEN}}</td>
            <td><a href="product/delete/{{$data->SP_MA}}"><i class="far fa-trash-alt"></i></a></td>
            <td> 
                <a href="product/edit/{{$data->SP_MA}}">
            <i class="fa fa-edit"></i>
            </a>
            </td>
        </tr>
        @endforeach
       
        
       
    </tfoot>
</table>
{{$product->links()}}