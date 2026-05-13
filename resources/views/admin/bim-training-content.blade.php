@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid pt-4">
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-0">
                    <i class="fas fa-edit mr-2 text-primary"></i>
                    Manage BIM Training Page Content
                </h4>
            </div>
        </div>

        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        timer: 3000,
                        showConfirmButton: false,
                    });
                });
            </script>
        @endif

        <form action="{{ route('bim-training-content.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="meta-tab" data-toggle="pill" href="#meta" role="tab" aria-selected="true">Meta Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hero-tab" data-toggle="pill" href="#hero" role="tab" aria-selected="false">Hero Section</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="about-tab" data-toggle="pill" href="#about" role="tab" aria-selected="false">About Section</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="learn-tab" data-toggle="pill" href="#learn" role="tab" aria-selected="false">Learn Section</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tools-tab" data-toggle="pill" href="#tools" role="tab" aria-selected="false">Tools & Trainer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cert-tab" data-toggle="pill" href="#cert" role="tab" aria-selected="false">Certificate</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        {{-- Meta Tab --}}
                        <div class="tab-pane fade show active" id="meta" role="tabpanel">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $content->meta_title }}">
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="3">{{ $content->meta_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords" rows="3">{{ $content->meta_keywords }}</textarea>
                            </div>
                        </div>

                        {{-- Hero Tab --}}
                        <div class="tab-pane fade" id="hero" role="tabpanel">
                            <div class="form-group">
                                <label>Hero Title (Use &lt;br&gt; for line break)</label>
                                <input type="text" class="form-control" name="hero_title" value="{{ $content->hero_title }}">
                            </div>
                            <div class="form-group">
                                <label>Hero Description</label>
                                <textarea class="form-control" name="hero_description" rows="4">{{ $content->hero_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hero Background Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="hero_image" class="custom-file-input" id="heroImageFile">
                                        <label class="custom-file-label" for="heroImageFile">Choose image</label>
                                    </div>
                                </div>
                                @if($content->hero_image)
                                    <img src="{{ asset($content->hero_image) }}" alt="Hero Image" class="img-thumbnail mt-2" style="max-height: 100px;">
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label>Course Fee</label>
                                    <input type="text" class="form-control" name="hero_fee" value="{{ $content->hero_fee }}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Duration</label>
                                    <input type="text" class="form-control" name="hero_duration" value="{{ $content->hero_duration }}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Timing</label>
                                    <input type="text" class="form-control" name="hero_timing" value="{{ $content->hero_timing }}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Batch Start Date</label>
                                    <input type="text" class="form-control" name="hero_batch_start" value="{{ $content->hero_batch_start }}">
                                </div>
                            </div>
                        </div>

                        {{-- About Tab --}}
                        <div class="tab-pane fade" id="about" role="tabpanel">
                            <div class="form-group">
                                <label>About Section Title</label>
                                <input type="text" class="form-control" name="about_title" value="{{ $content->about_title }}">
                            </div>
                            <div class="form-group">
                                <label>About Description 1</label>
                                <textarea class="form-control" name="about_description_1" rows="3">{{ $content->about_description_1 }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>About Description 2</label>
                                <textarea class="form-control" name="about_description_2" rows="3">{{ $content->about_description_2 }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>About Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="about_image" class="custom-file-input" id="aboutImageFile">
                                        <label class="custom-file-label" for="aboutImageFile">Choose image</label>
                                    </div>
                                </div>
                                @if($content->about_image)
                                    <img src="{{ asset($content->about_image) }}" alt="About Image" class="img-thumbnail mt-2" style="max-height: 150px;">
                                @endif
                            </div>
                        </div>

                        {{-- Learn Tab --}}
                        <div class="tab-pane fade" id="learn" role="tabpanel">
                            <div class="form-group">
                                <label>Learn Section Title</label>
                                <input type="text" class="form-control" name="learn_section_title" value="{{ $content->learn_section_title }}">
                            </div>
                            <div class="form-group">
                                <label>Learn Section Description</label>
                                <textarea class="form-control" name="learn_section_desc" rows="2">{{ $content->learn_section_desc }}</textarea>
                            </div>
                            <hr>
                            <h5 class="text-primary mb-3">Learn Modules</h5>
                            <div id="learn-modules-container">
                                @php $learnModules = $content->learn_modules ?? []; @endphp
                                @foreach($learnModules as $index => $module)
                                <div class="card card-outline card-secondary mb-3 module-item">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="learn_modules[{{$index}}][title]" value="{{ $module['title'] ?? '' }}">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label>Subtitle</label>
                                                <input type="text" class="form-control" name="learn_modules[{{$index}}][subtitle]" value="{{ $module['subtitle'] ?? '' }}">
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Icon</label>
                                                <input type="text" class="form-control" name="learn_modules[{{$index}}][icon]" value="{{ $module['icon'] ?? '' }}">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control p-1" name="learn_modules[{{$index}}][image]">
                                                @if(isset($module['image']) && $module['image'])
                                                    <input type="hidden" name="learn_modules[{{$index}}][existing_image]" value="{{ $module['image'] }}">
                                                    <img src="{{ asset($module['image']) }}" alt="Image" class="img-thumbnail mt-1" style="max-height: 40px;">
                                                @endif
                                            </div>
                                            <div class="col-md-1 form-group d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-module w-100"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>List Items (one per line)</label>
                                            <textarea class="form-control" name="learn_modules[{{$index}}][items_str]" rows="4">{{ isset($module['items']) ? implode("\n", $module['items']) : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-info" id="add-module"><i class="fas fa-plus mr-1"></i> Add Module</button>
                        </div>

                        {{-- Tools Tab --}}
                        <div class="tab-pane fade" id="tools" role="tabpanel">
                            <div class="form-group">
                                <label>Tools Section Title</label>
                                <input type="text" class="form-control" name="tools_title" value="{{ $content->tools_title }}">
                            </div>
                            <div class="form-group">
                                <label>Tools Section Description</label>
                                <textarea class="form-control" name="tools_desc" rows="2">{{ $content->tools_desc }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Revit Description List (one per line)</label>
                                    <textarea class="form-control" name="revit_desc_str" rows="4">{{ is_array($content->revit_desc_list) ? implode("\n", $content->revit_desc_list) : '' }}</textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Other Tools List (one per line)</label>
                                    <textarea class="form-control" name="other_tools_str" rows="4">{{ is_array($content->other_tools_list) ? implode("\n", $content->other_tools_list) : '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                            <h5 class="text-primary mb-3">Trainer Details</h5>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Trainer Name</label>
                                    <input type="text" class="form-control" name="trainer_name" value="{{ $content->trainer_name }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Trainer Role</label>
                                    <input type="text" class="form-control" name="trainer_role" value="{{ $content->trainer_role }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Trainer Bullets (one per line)</label>
                                    <textarea class="form-control" name="trainer_bullets_str" rows="4">{{ is_array($content->trainer_bullets) ? implode("\n", $content->trainer_bullets) : '' }}</textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Trainer Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="trainer_image" class="custom-file-input" id="trainerImageFile">
                                            <label class="custom-file-label" for="trainerImageFile">Choose image</label>
                                        </div>
                                    </div>
                                    @if($content->trainer_image)
                                        <img src="{{ asset($content->trainer_image) }}" alt="Trainer Image" class="img-thumbnail mt-2" style="max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <h5 class="text-primary mb-3">Program Outcomes</h5>
                            <div id="outcomes-container">
                                @php $outcomes = $content->program_outcomes ?? []; @endphp
                                @foreach($outcomes as $index => $outcome)
                                <div class="row mb-2 outcome-item">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="program_outcomes[{{$index}}][icon]" value="{{ $outcome['icon'] ?? '' }}" placeholder="Icon Class (e.g. bi-check)">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="program_outcomes[{{$index}}][text]" value="{{ $outcome['text'] ?? '' }}" placeholder="Outcome text">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-outcome w-100"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-info btn-sm mt-2" id="add-outcome"><i class="fas fa-plus mr-1"></i> Add Outcome</button>
                        </div>

                        {{-- Certificate Tab --}}
                        <div class="tab-pane fade" id="cert" role="tabpanel">
                            <div class="form-group">
                                <label>Certificate Section Title</label>
                                <input type="text" class="form-control" name="certificate_section_title" value="{{ $content->certificate_section_title }}">
                            </div>
                            <div class="form-group">
                                <label>Certificate Section Description</label>
                                <textarea class="form-control" name="certificate_section_desc" rows="2">{{ $content->certificate_section_desc }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Organization Name</label>
                                    <input type="text" class="form-control" name="certificate_org_name" value="{{ $content->certificate_org_name }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Certificate Title</label>
                                    <input type="text" class="form-control" name="certificate_title" value="{{ $content->certificate_title }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Awarded To Text</label>
                                    <input type="text" class="form-control" name="certificate_awarded_to_text" value="{{ $content->certificate_awarded_to_text }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Course Title</label>
                                    <input type="text" class="form-control" name="certificate_course_title" value="{{ $content->certificate_course_title }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Body Text (HTML allowed)</label>
                                    <textarea class="form-control" name="certificate_body_text" rows="3">{{ $content->certificate_body_text }}</textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Course Tools Text</label>
                                    <input type="text" class="form-control" name="certificate_course_tools" value="{{ $content->certificate_course_tools }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Signature Name</label>
                                    <input type="text" class="form-control" name="certificate_signature_name" value="{{ $content->certificate_signature_name }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Signature Role (HTML allowed)</label>
                                    <textarea class="form-control" name="certificate_signature_role" rows="3">{{ $content->certificate_signature_role }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btn-lg px-5"><i class="fas fa-save mr-2"></i> Save Content</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let moduleIndex = {{ isset($content->learn_modules) && is_array($content->learn_modules) ? count($content->learn_modules) : 0 }};
    document.getElementById('add-module').addEventListener('click', function() {
        const container = document.getElementById('learn-modules-container');
        const html = `
            <div class="card card-outline card-secondary mb-3 module-item">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="learn_modules[${moduleIndex}][title]">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Subtitle</label>
                            <input type="text" class="form-control" name="learn_modules[${moduleIndex}][subtitle]">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Icon</label>
                            <input type="text" class="form-control" name="learn_modules[${moduleIndex}][icon]">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Image</label>
                            <input type="file" class="form-control p-1" name="learn_modules[${moduleIndex}][image]">
                        </div>
                        <div class="col-md-1 form-group d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-module w-100"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>List Items (one per line)</label>
                        <textarea class="form-control" name="learn_modules[${moduleIndex}][items_str]" rows="4"></textarea>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        moduleIndex++;
    });

    document.getElementById('learn-modules-container').addEventListener('click', function(e) {
        if(e.target.closest('.remove-module')) {
            e.target.closest('.module-item').remove();
        }
    });

    let outcomeIndex = {{ isset($content->program_outcomes) && is_array($content->program_outcomes) ? count($content->program_outcomes) : 0 }};
    document.getElementById('add-outcome').addEventListener('click', function() {
        const container = document.getElementById('outcomes-container');
        const html = `
            <div class="row mb-2 outcome-item">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="program_outcomes[${outcomeIndex}][icon]" placeholder="Icon Class (e.g. fa-check)">
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="program_outcomes[${outcomeIndex}][text]" placeholder="Outcome text">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-outcome w-100"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
        outcomeIndex++;
    });

    document.getElementById('outcomes-container').addEventListener('click', function(e) {
        if(e.target.closest('.remove-outcome')) {
            e.target.closest('.outcome-item').remove();
        }
    });
});
</script>
@endsection
