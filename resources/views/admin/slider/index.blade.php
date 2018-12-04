@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h1>
                لیست محصولات وب سایت
            </h1>
        </header>
        <table class="table table-striped table-advance table-hover">
            <thead>
            <tr>
                <th><i class="icon-bullhorn"></i>ردیف</th>
                <th><i class="icon-bullhorn"></i>تصویر</th>
                <th><i class="icon-bullhorn"></i>عنوان</th>
                <th><i class="icon-bullhorn"></i>لینک</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($slider as $key => $val)
            <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{$val->image}}" height="100" alt=""></td>
                <td><a href="#">{{$val->title}}</a></td>
                <td class="hidden-phone">{{$val->url}}</td>
                <td>
                 <a href="{{route('slider.edit',['id'=>$val->id])}}" class="btn btn-success btn-xs"><i class="icon-ok"></i>ویرایش</a>
                </td>
                <td>
                    <form action="{{route('slider.destroy',['id'=>$val->id])}}" method="post">
                    {{ method_field('delete') }}
                    {{csrf_field()}}
                    <button  type="submit" class="btn btn-success btn-xs"><i class="icon-ok"></i>حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
    <div class="text-center">
        {{$slider->links()}}
    </div>
@endsection