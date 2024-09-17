@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí tập phim</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($episode))
                    {!! Form::open(['route'=>'episode.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route'=>['episode.update',$episode->id],'method'=>'PUT']) !!}
                    @endif
                        <div class="group-form">
                            {!! Form::label('Movie', 'Tên phim', []) !!}
                            {!! Form::select('movie_id',['0'=>'Chọn phim','Phim mới nhất'=>$movie],  isset($episode) ? $episode->movie_id : '', ['class'=>'form-control select-movie']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('Link', 'Link', []) !!}
                            {!! Form::text('linkphim', isset($episode) ? $episode->linkphim : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('tapphim', 'Tập Phim', []) !!}
                        @if(isset($episode))
                            {!! Form::text('episode',isset($episode) ? $episode->episode : '', ['class'=>'form-control','readonly']) !!}
                        @else
                            <select name="episode" id="episode" class="form-control"></select>
                        @endif
                        </div>
                        @if (!isset($episode))
                        {!! Form::submit('Thêm', ['class'=>'btn btn-success']) !!}
                        @else
                        {!! Form::submit('Cập nhật', ['class'=>'btn btn-success']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
