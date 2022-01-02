<html>
    <head></head>
    <body>
        @php
            echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($barcode->barcode, 'C39+',1,33,array(0,0,0), true) . '" alt="barcode"  />';
        @endphp
        @if(is_object($barcode->catalog))
        <br>
        <img src="{{url('uploads/'.$barcode->catalog->barcode_image)}}" alt="{{$barcode->catalog->name}}" style="width: 286px;">
        @endif
        {{-- <img src="https://livewellgx.com/uploads/07-2021/1626364864F6gAJOew9zb0.174658.png" alt="" style="width: 286px;"> --}}
        {{-- <img src="https://livewellgx.com/uploads/07-2021/1626349585YIzh2fJdXy20.484627.png" alt="" style="width: 100px;margin-left: 85px;"> --}}
    </body>
    <script>
        window.print();

    </script>
</html>