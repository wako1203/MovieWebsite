@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table" id="theloai" style="width:100%;">
                <thead>
                    <tr  style="color: orange">
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Decription</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Active/Inactive</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $key => $cate)
                        <tr  style="color: #fff">
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate -> title}}</td>
                            <td>{{$cate -> description}}</td>
                            <td>{{$cate -> slug}}</td>
                            <td>
                                @if($cate -> status )
                                    Hiển thị
                                @else
                                    Không hiển thị
                                @endif
                            </td>
                            <td>
                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route' =>['genre.destroy',$cate->id],
                                    'onsubmit' => 'return confirm("Delete?")'
                                ]) !!}
                                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('genre.edit',$cate->id )}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
