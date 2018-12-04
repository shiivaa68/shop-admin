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
                <th><i class="icon-bullhorn"></i>نام کاربر</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>ایمیل</th>
                <th><i class="icon-bullhorn"></i>مدیریت دسترسی ها</th>
                <th><i class="icon-bullhorn"></i>وضعیت</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="#">{{$user->name}}</a></td>
                <td class="hidden-phone">{{$user->email}}</td>
                <td class="hidden-phone">
                    <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-success btn-xs"><i class="icon-ok"></i>مدیریت سطح دسترسی</a>
                </td>
                <td class="hidden-phone">{{$user->status}}</td>

                <td>
                    <form action="{{route('user.destroy',['id'=>$user->id])}}" method="post">
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
        {{$users->links()}}
    </div>
@endsection