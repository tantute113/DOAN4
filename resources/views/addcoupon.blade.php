
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

<form style="margin-top:90px;" method="post" enctype="multipart/form-data" action="{{route('admin.coupon.addpost')}}">
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
          <input type="text" id="form6Example2" name="MGG_MA" placeholder="Mã giảm giá" value="{{old('MGG_MA')}}" class="form-control" />
          @if($errors->has('MGG_MA')) 
         <span style="color: red ;"> {{ $errors->first('MGG_MA') }}</span>
           @endif
       
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="text" id="form6Example2" name="tengg" placeholder="Tên giảm giá" value="{{old('tengg')}}" class="form-control" />
          @if($errors->has('tengg')) 
         <span style="color: red ;"> {{ $errors->first('tengg') }}</span>
           @endif
       
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="text" id="form6Example2" name="ptgg" placeholder="Phần trăm giảm giá" value="{{old('ptgg')}}" class="form-control" />
          @if($errors->has('ptgg')) 
         <span style="color: red ;"> {{ $errors->first('ptgg') }}</span>
           @endif
       
        </div>
      </div>
    </div>
  
    <!-- Text input -->
    
    <!-- Text input -->
    
  
    <!-- Email input -->
    
    <!-- Number input -->
    
  
    <!-- Message input -->
   
  
    <!-- Checkbox -->
    
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-2">Xác nhận</button>
  </form>