<x-app-layout>



    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
      <h6 class="fw-semibold mb-0">Flipbook Setting</h6>
    
    </div>
        
        <div class="row gy-4">
          <div class="col-lg-12">
            <div class="card">
            
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Update</h5>
                <a href="{{ route('admin.pdfSlide.index') }}" class="text-decoration-none">
                    <button type="button" class="btn btn-primary">Back</button></a>
            </div>
              <div class="card-body">
            

                <form action="{{ route('admin.pdfSlide.update') }}" method="POST" class="row gy-3 needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pdfSlide->id }}">
                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $pdfSlide->title) }}" required>
                        <div class="invalid-feedback">
                            Please enter a title.
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">Description</label>
                        <textarea name="desc" class="form-control" rows="4" cols="50" placeholder="Enter a description...">{{ old('desc', $pdfSlide->desc) }}</textarea>
                    </div>
                
                    <div class="col-md-12">
                        <label class="form-label">Upload PDF</label>
                        <input type="hidden" name="old_pdf" value="{{ $pdfSlide->attachment }}"/>
                        <input class="form-control" type="file" name="attachment" accept=".pdf">
                        <div class="invalid-feedback">
                            Please choose a file.
                        </div>
                        @if ($pdfSlide->attachment)
                            <iframe src="{{ asset('storage/' . $pdfSlide->attachment) }}" width="50%"      class="mt-2" height="100px"></iframe>
                            <a href="{{ asset('storage/' . $pdfSlide->attachment) }}" class=" ms-3" download>Download PDF</a>

                        @endif
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">Mode</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="mode" id="inlineRadio1" value="normal" {{ $pdfSlide->mode == 'normal' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Normal</label>
                            </div>

                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="mode" id="inlineRadio3" value="fullscreen" {{ $pdfSlide->mode == 'fullscreen' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio3">Fullscreen</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">View Mode</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="webgl" value="webgl" {{ $pdfSlide->view_mode == 'webgl' ? 'checked' : '' }}>
                                <label class="form-check-label" for="webgl">Webgl</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="3d" value="3d" {{ $pdfSlide->view_mode == '3d' ? 'checked' : '' }}>
                                <label class="form-check-label" for="3d">3D</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="2d" value="2d" {{ $pdfSlide->view_mode == '2d' ? 'checked' : '' }}>
                                <label class="form-check-label" for="2d">2D</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="swipe" value="swipe" {{ $pdfSlide->view_mode == 'swipe' ? 'checked' : '' }}>
                                <label class="form-check-label" for="swipe">Swipe</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="scroll" value="scroll" {{ $pdfSlide->view_mode == 'scroll' ? 'checked' : '' }}>
                                <label class="form-check-label" for="scroll">Scroll</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="simple" value="simple" {{ $pdfSlide->view_mode == 'simple' ? 'checked' : '' }}>
                                <label class="form-check-label" for="simple">Simple</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">Initial Zoom</label>
                        <input type="text" name="initial_zoom" class="form-control" value="{{ old('initial_zoom', $pdfSlide->initial_zoom) }}" required>
                        <div class="invalid-feedback">
                            Please enter an initial zoom.
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">Zoom Step</label>
                        <input type="text" name="zoom_step" class="form-control" value="{{ old('zoom_step', $pdfSlide->zoom_step) }}" required>
                        <div class="invalid-feedback">
                            Please enter a zoom step.
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label class="form-label">Double Click Zoom</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="double_click_zoom" id="inlineRadioYes" value="1" {{ $pdfSlide->double_click_zoom ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="double_click_zoom" id="inlineRadioNo" value="0" {{ !$pdfSlide->double_click_zoom ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioNo">No</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label class="form-label">Single Page</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="single_page" id="inlineRadioYes1" value="1" {{ $pdfSlide->single_page ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioYes1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="single_page" id="inlineRadioNo1" value="0" {{ !$pdfSlide->single_page ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioNo1">No</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label class="form-label">Autoplay Start</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="autoplay_start" id="inlineRadioYes2" value="1" {{ $pdfSlide->autoplay_start ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioYes2">Yes</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="autoplay_start" id="inlineRadioNo2" value="0" {{ !$pdfSlide->autoplay_start ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioNo2">No</label>
                            </div>
                        </div>
                    </div>




   
                                    
                    <div class="col-md-3">
                        <label class="form-label">Autoplay Interval</label>
                        <input type="number" name="autoplay_interval" class="form-control" value="{{$pdfSlide->autoplay_interval ?? ''}}" required>
                        <div class="invalid-feedback">
                            Please enter an autoplay interval .
                        </div>
                    </div>


{{--                 
                    <div class="col-md-4">
                        <label class="form-label">PDF Start</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="pdf_start" id="inlineRadioYes3" value="1" {{ $pdfSlide->pdf_start ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioYes3">Yes</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="pdf_start" id="inlineRadioNo3" value="0" {{ !$pdfSlide->pdf_start ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadioNo3">No</label>
                            </div>
                        </div>
                    </div>
                 --}}
                    <div class="col-md-8">
                        <label class="form-label">Upload Logo</label>
                        <input type="hidden" name="old_image" value="{{ $pdfSlide->logo_image }}"/>
                        <input class="form-control" type="file" name="logo_image">
                        <div class="invalid-feedback">
                            Please choose a file.
                        </div>
                        @if ($pdfSlide->logo_image)
                          <a href="{{ asset('storage/' . $pdfSlide->logo_image) }}" target="_blank">Preview</a>
                          <img src="{{asset('storage/'.$pdfSlide->logo_image)}}" height="100" width="100" class="img-fluid mt-2">
                        @endif
                    </div>
                
                    <div class="col-12">
                        <button class="btn btn-primary-600" type="submit">Submit</button>
                    </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      @push('script')


      @endpush
</x-app-layout>