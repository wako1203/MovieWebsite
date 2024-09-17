@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí thể loại</div>
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
                    @if (!isset($genre))
                    {!! Form::open(['route'=>'genre.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route'=>['genre.update',$genre->id],'method'=>'PUT']) !!}
                    @endif
                        <div class="group-form">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...', 'id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...', 'id'=>'convert_slug']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('desciption', 'Description', []) !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...', ]) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('status', 'Status', []) !!}
                            @if (!isset($genre))
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không hiển thị'], null, ['class'=>'form-control']) !!}
                            @else
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không hiển thị'], $genre->status, ['class'=>'form-control']) !!}
                            @endif
                        </div>
                        @if (!isset($genre))
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
