
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

<form style="margin-top:90px;" method="post" enctype="multipart/form-data" action="{{route('admin.contact.addpost')}}">
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
  
  
  
  
  <div class="form-outline mb-2">
    <textarea class="form-control" id="exampleFormControlTextarea1" name="diachi" rows="3" placeholder="Địa chỉ">{{old('diachi')}}</textarea>
  
    @if($errors->has('diachi')) 
       <span style="color: red ;"> {{ $errors->first('diachi') }}</span>
         @endif
  </div>
  
  
  
  
      <div class="col">
        <div class="form-outline">
          <input type="text" id="form6Example2" name="sodt" placeholder="Số điện thoại" value="{{old('sodt')}}" class="form-control" />
          @if($errors->has('sodt')) 
         <span style="color: red ;"> {{ $errors->first('sodt') }}</span>
           @endif
       
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="text" id="form6Example2" name="email" placeholder="Email" value="{{old('email')}}" class="form-control" />
          @if($errors->has('email')) 
         <span style="color: red ;"> {{ $errors->first('email') }}</span>
           @endif
       
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="text" id="form6Example2" name="facebook" placeholder="Facebook" value="{{old('facebook')}}" class="form-control" />
          @if($errors->has('facebook')) 
         <span style="color: red ;"> {{ $errors->first('facebook') }}</span>
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