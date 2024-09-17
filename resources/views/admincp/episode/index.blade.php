@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <table class="table" id="tapphim">
                <thead>
                    <tr  style="color: orange">
                        <th scope="col">#</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Link</th>
                        <th scope="col">Tập</th>
                        <th scope="col">Quản lí</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $key => $cate)
                        <tr  style="color: #fff">
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate -> movie -> title}}</td>
                            <td><img width ="30%" src="{{asset('uploads/movie/'.$cate -> movie -> image)}}" alt=""></td>
                            <td>{{$cate -> linkphim}}</td>
                            <td>{{$cate -> episode}}</td>
                            <td>
                                {!! Form::open([
                                    'method' =>'DELETE',
                                    'route' =>['episode.destroy',$cate->id],
                                    'onsubmit' => 'return confirm("Delete?")'
                                ]) !!}
                                    {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('episode.edit',$cate->id )}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
