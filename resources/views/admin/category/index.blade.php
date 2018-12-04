@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h1>
                لیست محصولات وب سایت
            </h1>
            <div>
                <form action="">
                    <input type="text" name="title" placeholder="انگلیسی">
                    <input type="text" name="title_fa" placeholder="فارسی">
                    <input type="submit" value="جستجو" class="btn btn-success btn-sm">
                </form>
            </div>
        </header>
        <table class="table table-striped table-advance table-hover">
            <thead>
            <tr>
                <th><i class="icon-bullhorn"></i>ردیف</th>
                <th><i class="icon-bullhorn"></i>تصویر</th>
                <th><i class="icon-bullhorn"></i>نام انگلیسی</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>نام دسته بندی</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td><img src="{{$val->image}}" width="50" alt=""></td>
                <td><a href="#">{{$val->title}}</a></td>
                <td class="hidden-phone">{{$val->title_fa}}</td>
                <td>
                 <a href="{{route('category.edit',['id'=>$val->id])}}" class="btn btn-success btn-xs"><i class="icon-ok"></i>ویرایش</a>
                </td>
                <td>
                    <form action="{{route('category.destroy',['id'=>$val->id])}}" method="post">
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
        {{$category->links()}}
    </div>
@endsection