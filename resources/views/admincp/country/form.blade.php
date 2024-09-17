@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lí quốc gia</div>
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
                    @if (!isset($country))
                    {!! Form::open(['route'=>'country.store','method'=>'POST']) !!}
                    @else
                    {!! Form::open(['route'=>['country.update',$country->id],'method'=>'PUT']) !!}
                    @endif
                        <div class="group-form">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($country) ? $country->title : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...','id'=>'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($country) ? $country->slug : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...','id'=>'convert_slug']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('desciption', 'Description', []) !!}
                            {!! Form::textarea('description', isset($country) ? $country->description : '', ['class'=>'form-control','placeholder'=>'Điền dữ liệu vào...']) !!}
                        </div>
                        <div class="group-form">
                            {!! Form::label('status', 'Status', []) !!}
                            @if (!isset($country))
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không hiển thị'], null, ['class'=>'form-control']) !!}
                            @else
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không hiển thị'], $country->status, ['class'=>'form-control']) !!}
                            @endif
                        </div>
                        @if (!isset($country))
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

