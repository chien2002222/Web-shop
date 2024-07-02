@extends('admin.main')

@section('content')

    <div class="card mb-4">
      <h5 class="card-header">Form Controls</h5>
      <form action="" method="POST">
        <div class="card-body demo-vertical-spacing demo-only-element">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              <label for="exampleFormControlInput1">Tên danh mục</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <select class="form-select" name="parent_id" id="exampleFormControlSelect1" aria-label="Default select example">
                <option value="0">Danh mục cha</option>
                @foreach($menus as $menu)
                <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
              </select>
              <label for="exampleFormControlSelect1">Danh mục</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <input class="form-control" name="description" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
              <datalist id="datalistOptions">
                <option value="San Francisco"></option>
                <option value="New York"></option>
                <option value="Seattle"></option>
                <option value="Los Angeles"></option>
                <option value="Chicago"></option>
              </datalist>
              <label for="exampleDataList">Mô tả</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <textarea class="form-control h-px-100" name="content" id="exampleFormControlTextarea1" placeholder="Comments here..."></textarea>
              <label for="exampleFormControlTextarea1">Mô tả chi tiết</label>
            </div>
            <div class="col-md mb-4">
                <small class="text-light fw-medium">Kích hoạt</small>
                <div class="form-check mt-3">
                  <input class="form-check-input" value="1" type="radio" id="active" name="active" checked="">
                  <label class="form-check-label" for="defaultRadio1"> Có </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="0" type="radio" id="no_active" name="active" >
                  <label class="form-check-label" for="defaultRadio2"> Không </label>
                </div>
    
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <button type="submit" class="btn btn-primary">Tạo danh mục</button>
              </div>

          </div>
          @csrf
      </form>
   
    </div>

@endsection