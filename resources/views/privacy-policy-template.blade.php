{{--
  Template Name: Privacy Policy
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')
    <section>
        <div class="text-base/8 mx-auto max-w-7xl px-4 pb-20 pt-12 sm:px-6 sm:pt-14">
            {!! $privacy['text'] !!}
        </div>
    </section>
@endsection
