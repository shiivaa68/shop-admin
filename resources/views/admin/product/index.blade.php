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
                <th><i class="icon-bullhorn"></i>نام محصول</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>برند</th>
                <th><i class="icon-bookmark"></i>تصویر</th>
                <th><i class=" icon-edit"></i>قیمت</th>
                <th>گالری تصاویر</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><a href="#">{{$product->name}}</a></td>
                <td class="hidden-phone">{{$product->brand}}</td>
                <td><img src="{{$product->image}}" width="70"></td>
                <td>{{number_format($product->price)}}</td>
                <td>
                    <a href="product/gallery?id={{$product->id}}" class="btn btn-info btn-xs"><i class="icon-ok"></i>گالری تصاویر</a>
                </td>
                <td>
                    &nbsp;
                {{--@can('edit_product',$product)--}}
                    <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success btn-xs"><i class="icon-ok"></i>ویرایش</a>
                {{--@endcan--}}
                </td>
                <td>
                    <form action="{{route('product.destroy',['id'=>$product->id])}}" method="post">
                    {{ method_field('delete') }}
                    {{csrf_field()}}
                    <button  type="submit" class="btn btn-danger btn-xs"><i class="icon-ok"></i>حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
    <div class="text-center">
        {{$products->links()}}
    </div>
@endsection