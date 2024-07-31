<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('backend/asset/css/lib/flipbook.min.css') }}">
    <title>{{ $pdfSlide->title }}</title>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
{{-- @dd($pdfSlide) --}}
    <script src="{{ asset('backend/asset/js/flipbook.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            console.log('PDF URL:', '{{ asset('storage/' . $pdfSlide->attachment) }}');
            console.log('Mode:', '{{ $pdfSlide->mode }}');
            console.log('View Mode:', '{{ $pdfSlide->view_mode }}');

            const flipBookOptions = {
            pdfUrl: '{{ asset('storage/' . $pdfSlide->attachment) }}',
            normal: {{ $pdfSlide->mode === 'normal' ? 'true' : 'false' }},
            fullScreen: {{ $pdfSlide->mode === 'fullscreen' ? 'true' : 'false' }},
            viewMode: '{{ $pdfSlide->view_mode }}',
            singlePageMode: {{ $pdfSlide->single_page === 1 ? 'true' : 'false' }},
            autoplayOnStart: {{ $pdfSlide->autoplay_start === 1 ? 'true' : 'false' }},
            autoplayInterval:  {{ $pdfSlide->autoplay_interval }},
            doubleClickZoom: {{ $pdfSlide->double_click_zoom === 1 ? 'true': 'false' }},
            initialZoom: {{ $pdfSlide->initial_zoom }},
            zoomStep: {{ $pdfSlide->zoom_step }},
          //  pdfStart: {{ $pdfSlide->pdf_start === 1 ? 'true' : 'false' }} // Add your condition here
        };

        const flipBookInstance = $('#container').flipBook(flipBookOptions);

        // Control the start behavior based on pdfStart option
        // if (!flipBookOptions.pdfStart) {
        //     flipBookInstance.stop(); // Assuming there is a stop method or equivalent in the library
        // }
    
        });
    </script>

</head>

<body>
    <div id="container"></div>
</body>

</html>
