@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            ویرایش {{ $user->name }}

        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{route('user.update',['id'=>$user->id])}}">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">نام </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ایمیل</label>
                    <div class="col-sm-10">
                        <input type="text" name="brand" class="form-control" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">سطح دسترسی</label>
                    <div class="col-sm-10">
                        <select name="roles_id[]" id="" multiple>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-danger" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection