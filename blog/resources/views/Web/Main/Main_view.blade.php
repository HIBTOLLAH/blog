@extends('layouts.Web_app')
@section('title')
Main Page
@endsection
@section('headerimage')
{{url('/images/home.png')}}
@endsection
@section('head')
<style>
.panel {
    border: 2px solid #0c5460; /* حدود صلبة بلون أزرق داكن */
    padding: 20px; /* مسافة داخلية أقل قليلاً */
    margin: 20px; /* مسافة خارجية أقل قليلاً */
    border-radius: 15px; /* زوايا منحنية أكثر انسيابية */
    background-color: #e9f7ef; /* خلفية خفيفة بلون أخضر فاتح */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* ظل لتأثير ثلاثي الأبعاد */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* تأثير تحريك عند التفاعل */
    width: 100%; /* عرض كامل للوحة */
}

.panel:hover {
    transform: translateY(-5px); /* رفع اللوحة قليلاً عند التحويم */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* زيادة الظل عند التحويم */
}

.panel label {
    font-size: 18px; /* حجم خط أكبر */
    font-weight: bold; /* خط عريض */
    color: #0c5460; /* لون الخط يطابق لون الحدود */
    display: block; /* ضمان عرض النص بشكل صحيح */
    text-align: center; /* توسيط النص */
    margin-top: 10px; /* مسافة بين النص والحدود العلوية */
}
</style>
@endsection

@section('contect')
<div class="row">
    @foreach($sections as $section)
    <div class="col-md-4">
        <a href="{{route('Web.Section.Index',['id'=>$section->id])}}">
        <div class="panel">
            <label>{{ $section->name }}</label>
        </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
