@extends('layouts.Web_app')

@section('title')
About Us
@endsection

@section('headerimage')
{{ url('/images/home.png') }}
@endsection

@section('head')
<!-- You can add custom head content here -->
@endsection

@section('contect')
<div class="container">
        <h1>Hakkımda</h1>
        <p>
            Bu proje, Eterna Teknoloji firmasında aldığım staj süresi boyunca geliştirdiğim bir blog uygulamasıdır.
            Laravel framework’ü kullanılarak tasarlanan bu sistem, kullanıcıların içerik oluşturmasına, düzenlemesine ve yorum yapmasına olanak tanımaktadır.
            Aynı zamanda bir yönetim paneli sayesinde içerikler ve kullanıcılar kolayca yönetilebilmektedir.
            Bu proje, yazılım geliştirme becerilerimi artırmak ve gerçek dünya uygulamalarıyla deneyim kazanmak amacıyla gerçekleştirilmiştir.
        </p>
    </div>
@endsection
