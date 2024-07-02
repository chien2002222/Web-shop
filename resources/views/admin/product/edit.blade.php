@extends('admin.main')

@section('content')

    <div class="card mb-4">
      <h5 class="card-header">Sửa sản phẩm</h5>
      <form action="" method="POST">
        <div class="card-body demo-vertical-spacing demo-only-element">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" name="name" class="form-control" value="{{$product->name}}" id="exampleFormControlInput1" placeholder="name@example.com">
              <label for="exampleFormControlInput1">Tên sản phẩm</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              
                
                <select class="form-control" name="menu_id">
                    <option >Danh mục</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{$product->menu_id==$menu->id? 'selected' : ''}}>{{ $menu->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="number" name="price" class="form-control" value="{{$product->price}}" id="exampleFormControlInput1" placeholder="name@example.com">
                <label for="exampleFormControlInput1">Giá gốc</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="number" name="price_sale" class="form-control"value="{{$product->price_sale}}" id="exampleFormControlInput1" placeholder="name@example.com">
                <label for="exampleFormControlInput1">Giá giảm</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" name="description" class="form-control" value="{{$product->description}}" id="exampleFormControlInput1" placeholder="name@example.com">
                <label for="exampleFormControlInput1">Mô tả</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" name="content" class="form-control" value="{{$product->content}}" id="exampleFormControlInput1" placeholder="name@example.com">
                <label for="exampleFormControlInput1">Mô tả chi tiết</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="file" class="form-control" id="upload" placeholder="name@example.com">
                <label for="exampleFormControlInput1">Ảnh sản phẩm </label>
                <div id="image_show">
                    <a href="" target="blank">
                        <img src="{{$product->image}}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="image" value="{{$product->image}}" id="image">
              </div>
              <div class="col-md mb-4">
                <small class="text-light fw-medium">Kích hoạt</small>
                <div class="form-check mt-3">
                  <input class="form-check-input" value="1" type="radio" id="active" name="active" {{$product ->active==1?'checked = ""':''}} >
                  <label class="form-check-label" for="defaultRadio1"> Có </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="0" type="radio" id="no_active" name="active" {{$product ->active==0?'checked = ""':''}}  >
                  <label class="form-check-label" for="defaultRadio2"> Không </label>
                </div>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
              </div>

          </div>
          @csrf
      </form>
   
    </div>

@endsection