
{{-- <div class="row">
  <div class="col-6">
<form action="{{route('import_csv')}}" method="POST" enctype="multipart/form-data">
  @csrf
  
<input class="form-control" type="file" name="file" accept=".xlsx"><br>
<input type="submit" value="Nhập Excel" name="import_csv" class="btn btn-warning">
</form>
</div>
<div class="col-6">
<form action="{{route('export_csv')}}" method="POST">
  @csrf
<input type="submit" value="Xuất Excel" name="export_csv" class="btn btn-success">
</form>
</div>
</div> --}}

<form style="margin-top:90px;" method="post" enctype="multipart/form-data" action="{{route('admin.product.addpost')}}">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-1">
    @csrf
    {{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}








    <div class="col">
      <div class="form-outline">
        <input type="text" name='ten' id="form6Example1" value="{{old('ten')}}" placeholder="Tên" class="form-control" />
        
        @if($errors->has('ten')) 
        <span style="color: red ;"> {{ $errors->first('ten') }}</span>
          @endif
       
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" name="gia" placeholder="Giá" value="{{old('gia')}}" class="form-control" />
        @if($errors->has('gia')) 
       <span style="color: red ;"> {{ $errors->first('gia') }}</span>
         @endif
     
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-2">
   
   
    
      <input class="form-control" type="file" name="img" id="formFile">
    
      
    
   
    @if($errors->has('img')) 
       <span style="color: red ;"> {{ $errors->first('img') }}</span>
         @endif
  </div>

  <!-- Text input -->
  <div class="form-outline mb-2">
    <textarea class="form-control" id="exampleFormControlTextarea1" name="mota" rows="3" placeholder="Mô tả">{{old('email')}}</textarea>
  
    @if($errors->has('mota')) 
       <span style="color: red ;"> {{ $errors->first('mota') }}</span>
         @endif
  </div>

  <!-- Email input -->
  
  <div class="form-outline mb-2">
    <select class="form-select" name="danhmuc" aria-label="Default select example">
     
      @foreach ($danhmuc as $danhmuc)
  
      <option  value="{{$danhmuc->DM_MA}}"   >{{$danhmuc->DM_TEN}}</option>
      
      @endforeach
    </select>
    @if($errors->has('danhmuc'))
    <span class="alert alert-danger">
        {{ $errors->first('danhmuc') }}
    </span>
  @endif
    </div>
  <!-- Number input -->
  

  <!-- Message input -->
 

  <!-- Checkbox -->
  

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2">Xác nhận</button>
</form>