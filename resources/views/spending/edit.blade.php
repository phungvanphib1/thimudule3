@extends('master')
@section('content')
    <div class="container">
        <div class="panel-body">
            <form role="form" class="form-horizontal " action="{{ route('spending.update' , $spending->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">Danh Mục</label>
                    <div class="col-lg-12">
                        <select class="form-select" name="category" aria-label="Default select example">
                            <option value="{{$spending->category}}">{{$spending->category}}</option>
                            <option value="Áo Quần">Áo Quần</option>
                            <option value="Thức Ăn">Thức Ăn</option>
                            <option value="Đồ Chơi Của Bé">Đồ Chơi Của Bé</option>
                        </select>
                        @error('category')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">Ngày</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="date" value="{{$spending->date}}" name="date" placeholder="" >
                        @error('date')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">Tiền</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" value="{{$spending->price}}" name="price" placeholder="" >
                        @error('price')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label class="col-lg-3 control-label">Ghi chú</label>
                    <div class="col-lg-12">
                        <textarea class="form-control" placeholder=""  name="note" value="{{$spending->note}}" id="floatingTextarea2" style="height: 100px">{!!$spending->note!!}</textarea>
                        @error('note')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-6">
                        <a href="{{ route('spending.index') }}" class="btn btn-danger" type="submit">Cancel</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
