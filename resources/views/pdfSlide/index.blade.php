<x-app-layout>

    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Flipbook Setting</h6>
            {{-- <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a href="" class="d-flex align-items-center gap-1 hover-text-primary">
        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
        Dashboard
      </a>
    </li>
    <li>-</li>
    <li class="fw-medium">Basic Table</li>
  </ul> --}}
        </div>

        <div class="row gy-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Flipbook Setting</h5>

                        <a href="{{ route('admin.pdfSlide.create') }}" class="text-decoration-none">
                            <button type="button" class="btn btn-primary">Add </button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table bordered-table mb-0">
                                <thead>
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($pdfSlide))
                                        @foreach ($pdfSlide as $key => $pdf)
                                            <tr class="table-active">
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td><a href="{{ route('pdfSlide.showBySlug', $pdf->slug) }}" class="text-decoration-none" target="_blank">
                                                  {{ $pdf->title }}
                                              </a></td>
                                              <td><a href="{{ route('pdfSlide.showBySlug', $pdf->slug) }}" class="" target="_blank">
                                               Preview
                                            </a></td>


                                                <td> <a href="{{ route('admin.pdfSlide.edit', $pdf->id) }}"
                                                        class="text-decoration-none">
                                                        <i class="fas fa-edit"></i>
                                                    </a></td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- card end -->
            </div>

        </div>
    </div>
</x-app-layout>
