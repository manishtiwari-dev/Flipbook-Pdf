<x-app-layout>



    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
      <h6 class="fw-semibold mb-0">Flipbook Setting</h6>
    
    </div>
        
        <div class="row gy-4">
          <div class="col-lg-12">
            <div class="card">
            
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Add</h5>
                <a href="{{ route('admin.pdfSlide.index') }}" class="text-decoration-none">
                    <button type="button" class="btn btn-primary">Back</button></a>
            </div>
              <div class="card-body">
                <form action="{{ route('admin.pdfSlide.store') }}" method="POST" class="row gy-3 needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="" required>
                        <div class="invalid-feedback">
                            Please enter a title.
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">Description</label>
                        <textarea name="desc" class="form-control" rows="4" cols="50" placeholder="Enter a description..."></textarea>
                    </div>
                
                    <div class="col-md-12">
                        <label class="form-label">Upload PDF</label>
                        <input class="form-control" type="file" name="attachment" required accept=".pdf">
                        <div class="invalid-feedback">
                            Please choose a file.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mode</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="mode" id="inlineRadio1" value="normal">
                                <label class="form-check-label" for="inlineRadio1">Normal</label>
                                {{-- <img src="{{asset('backend/asset/images/normal.avif')}}" alt="Normal mode image" class="img-fluid"> --}}
                            </div>

                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="mode" id="inlineRadio3" value="fullscreen">
                                <label class="form-check-label" for="inlineRadio3">Fullscreen</label>
                                {{-- <img src="{{asset('backend/asset/images/fullscreen.avif')}}" alt="Fullscreen mode image" class="img-fluid"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">View Mode</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="webgl" value="webgl">
                                <label class="form-check-label" for="webgl">Webgl</label>
                            </div>
                            <div class="form-check form-check-inline   d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="3d" value="3d">
                                <label class="form-check-label" for="3d">3D</label>
                            </div>
                            <div class="form-check form-check-inline   d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="2d" value="2d">
                                <label class="form-check-label" for="2d">2D</label>
                            </div>
                            <div class="form-check form-check-inline   d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="swipe" value="swipe">
                                <label class="form-check-label" for="swipe">Swipe</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="scroll" value="scroll">
                                <label class="form-check-label" for="scroll">Scroll</label>
                            </div>
                            <div class="form-check form-check-inline  d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="view_mode" id="simple" value="simple">
                                <label class="form-check-label" for="simple">Simple</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">Initial Zoom</label>
                        <input type="text" name="initial_zoom" class="form-control" value="" required>
                        <div class="invalid-feedback">
                            Please enter an initial zoom.
                        </div>
                    </div>
{{--                 
                    <div class="col-md-6">
                        <span class="mt-5">Example: 0.5, 0.6, 0.7, 0.8, 0.9, 1</span>
                    </div> --}}
                
                    <div class="col-md-6">
                        <label class="form-label">Zoom Step</label>
                        <input type="text" name="zoom_step" class="form-control" value="" required>
                        <div class="invalid-feedback">
                            Please enter a zoom step.
                        </div>
                    </div>
{{--                 
                    <div class="col-md-6">
                        <span class="mt-5">Example: 1.1, 1.2, 4</span>
                    </div>
                 --}}
                    <div class="col-md-3">
                        <label class="form-label">Double Click Zoom</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="double_click_zoom" id="inlineRadioYes" value="1">
                                <label class="form-check-label" for="inlineRadioYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="double_click_zoom" id="inlineRadioNo" value="0">
                                <label class="form-check-label" for="inlineRadioNo">No</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label class="form-label">Single Page</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="single_page" id="inlineRadioYes1" value="1" >
                                <label class="form-check-label" for="inlineRadioYes1">Yes</label>
                                
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="single_page" id="inlineRadioNo1" value="0">
                                <label class="form-check-label" for="inlineRadioNo1">No</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label class="form-label">Autoplay Start</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="autoplay_start" id="inlineRadioYes2" value="1">
                                <label class="form-check-label" for="inlineRadioYes2">Yes</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="autoplay_start" id="inlineRadioNo2" value="0">
                                <label class="form-check-label" for="inlineRadioNo2">No</label>
                            </div>
                        </div>
                    </div>

                    
                                    
                    <div class="col-md-3">
                        <label class="form-label">Autoplay Interval</label>
                        <input type="number" name="autoplay_interval" class="form-control" value="" required>
                        <div class="invalid-feedback">
                            Please enter an autoplay interval .
                        </div>
                    </div>
                    

                    {{-- <div class="col-md-4">
                        <label class="form-label">PDF Start</label>
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="pdf_start" id="inlineRadioYes3" value="1">
                                <label class="form-check-label" for="inlineRadioYes3">Yes</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input" type="radio" name="pdf_start" id="inlineRadioNo3" value="0">
                                <label class="form-check-label" for="inlineRadioNo3">No</label>
                            </div>
                        </div>
                    </div> --}}
                
                    <div class="col-md-8">
                        <label class="form-label">Upload Logo</label>
                        <input class="form-control" type="file" name="logo_image">
                        <div class="invalid-feedback">
                            Please choose a file.
                        </div>
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