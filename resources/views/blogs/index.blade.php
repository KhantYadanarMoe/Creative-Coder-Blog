@props(['categories', 'currentCategory'])
<x-layout>

    @if(session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
    <!-- hero section -->
    <x-hero></x-hero>

    <!-- blogs section -->
    <x-blog-section :blogs="$blogs"/>

    <!-- footer -->
    
    
</x-layout>