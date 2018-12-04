@extends('layouts.default')
@section('main')
<div id="content" class="col-sm-9">
    <div class="product-filter">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="List"><i class="fa fa-th-list"></i></button>
                    <button type="button" id="grid-view" class="btn btn-default selected" data-toggle="tooltip" title="" data-original-title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> </div>
            <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">مرتب سازی :</label>
            </div>
            <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                    <option value="" selected="selected">پیشفرض</option>
                    <option value="">نام (الف - ی)</option>
                    <option value="">نام (ی - الف)</option>
                    <option value="">قیمت (کم به زیاد)</option>
                    <option value="">قیمت (زیاد به کم)</option>
                    <option value="">امتیاز (بیشترین)</option>
                    <option value="">امتیاز (کمترین)</option>
                    <option value="">مدل (A - Z)</option>
                    <option value="">مدل (Z - A)</option>
                </select>
            </div>
            <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">نمایش :</label>
            </div>
            <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                    <option value="" selected="selected">20</option>
                    <option value="">25</option>
                    <option value="">50</option>
                    <option value="">75</option>
                    <option value="">100</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <div class="row products-category">

        @foreach($category->product as $pro)
        <div class="product-layout product-grid col-lg-5ths col-md-5ths col-sm-3 col-xs-12">
            <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-200x200.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive"></a></div>
                <div>
                    <div class="caption">
                        <h4><a href="product.html"> {{$pro->name}} </a></h4>
                        <p class="description"> آخرین دستاورد های روز دنیا

                            شامل تمام اطلاعاتی که به آن نیاز خواهید داشت ...</p>
                        <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> <span class="price-tax">بدون مالیات : 90000 تومان</span> </p>
                    </div>
                    <div class="button-group">
                        <button class="btn-primary" type="button" onclick=""><span>افزودن به سبد</span></button>
                        <div class="add-to-links">
                            <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                            <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="مقایسه این محصول"><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-sm-6 text-left">
            <ul class="pagination">
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">&gt;</a></li>
                <li><a href="#">&gt;|</a></li>
            </ul>
        </div>
        <div class="col-sm-6 text-right">نمایش 1 تا 12 از 15 (مجموع 2 صفحه)</div>
    </div>
</div>
@endsection