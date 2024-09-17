@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px; padding-left: 0px">
    <div class="row justify-content-center">
        <div class="col-md-12" style="">
            <table class="table" id="phim" style="">
                <thead>
                    <tr style="color: orange; width: 100%; ">
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Đạo diễn</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Thời lượng</th>
                        <th scope="col">Số tập</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Hiển thị</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Quốc gia</th>
                        <th scope="col">Thể Loại</th>
                        <th scope="col">Hot</th>
                        <th scope="col">Chất lượng</th>
                        <th scope="col">Phụ đề</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">cập nhật</th>
                        <th scope="col">Quản lí</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $key => $cate)
                        <tr style="color: #fff">
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate -> title}}</td>
                            <td>{{$cate -> director}}</td>
                            <td><img width ="120%" src="{{asset('uploads/movie/'.$cate->image)}}" alt=""></td>
                            <td 
                            style="overflow: hidden;
                            text-overflow: ellipsis;
                            line-height: 30px;
                            -webkit-line-clamp: 5;
                            height: 140px;
                            display: -webkit-box;
                            -webkit-box-orient: vertical;">{{$cate -> description}}</td>
                            <td>{{$cate -> time}}</td>
                            <td>{{$cate -> sotap}}</td>
                            <td>{{$cate -> slug}}</td>
                            <td>
                                @if($cate -> status )
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td>
                            <td>{{$cate -> category->title}}</td>
                            <td>{{$cate -> country->title}}</td>
                            <td>{{$cate -> genre->title}}</td>
                            <td>
                                @if($cate -> hot )
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td>
                            <td>
                                @if($cate -> resolution == 1)
                                    SD
                                @elseif($cate -> resolution == 0)
                                        HD
                                @else
                                        Full HD
                                @endif
                            </td>
                            <td>{{$cate -> phude}}</td>
                            <td>{{$cate -> ngaytao}}</td>
                            <td>{{$cate -> ngaycapnhat}}</td>
                            <td>
                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route' =>['movie.destroy',$cate->id],
                                    'onsubmit' => 'return confirm("Delete?")'
                                ]) !!}
                                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('movie.edit',$cate->id )}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
