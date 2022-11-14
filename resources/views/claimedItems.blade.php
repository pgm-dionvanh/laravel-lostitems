@section('title', 'Lost items')

@section('logo', 'Lostitems')

@include('includes.header')

@yield('content')

@include('includes.footer')





<section id="content">
<div class="container mx-auto">
    <div class="flex flex-wrap -mx-4">
    @if ($claimedItems->count() > 0)
    @foreach ($claimedItems as $claimedItem)
        <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
            <a class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
            
                <div class="p-4">
                    <h2 class="mt-2 mb-2  font-bold">Item id: {{ $claimedItem->lostitems_id }}</h2>
                </div>
                <div class="p-4 border-t border-b text-xs text-gray-700">
                    <span class="flex items-center mb-1">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2m0-5c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3m-7 2.602c0-3.517 3.271-6.602 7-6.602s7 3.085 7 6.602c0 3.455-2.563 7.543-7 14.527-4.489-7.073-7-11.072-7-14.527m7-7.602c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602"/></svg> Mariakerke Artevelde hogeschool (RECEPTIE)
                    </span>
                </div>
    </div>
            @endforeach
            @else
                <div>No items found</div>
            @endif
</div>
</section>


