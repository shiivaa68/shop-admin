@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            افزودن سطح دسترسی جدید
        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" enctype="multipart/form-data" action="{{route('role.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">نام سطح دسترسی</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">عنوان</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">دسترسی ها</label>
                    <div class="col-sm-10">
                       <select name="permission_id[]" id="" multiple>
                           @foreach($permissions  as $permission)
                                <option value="{{$permission->id}}">
                                    {{$permission->title}}
                                </option>
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