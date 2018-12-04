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
                <th><i class="icon-bullhorn"></i>نام </th>
                <th><i class="icon-bookmark"></i>عنوان</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td><a href="#">{{$permission->name}}</a></td>
                <td class="hidden-phone">{{$permission->title}}</td>
                <td>&nbsp;

                    <a href="{{route('permission.edit',['id'=>$permission->id])}}" class="btn btn-success btn-xs"><i class="icon-ok"></i>ویرایش</a>

                </td>

                <td>
                    <form action="{{route('permission.destroy',['id'=>$permission->id])}}" method="post">
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
        {{$permissions->links()}}
    </div>
@endsection