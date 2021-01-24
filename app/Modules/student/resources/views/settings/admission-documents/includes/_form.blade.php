<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.ar_admission_document_name') }}</label>
            <input type="text" class="form-control @error('ar_name') is-invalid @enderror"
                placeholder="{{ trans('student::local.ar_admission_document_name') }}" name="ar_name"
                value="{{ old('ar_name', $admission_document->ar_name) }}">
            @error('ar_name')
                <span class="danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.en_admission_document_name') }}</label>
            <input type="text" class="form-control @error('en_name') is-invalid @enderror"
                placeholder="{{ trans('student::local.en_admission_document_name') }}" name="en_name"
                value="{{ old('en_name', $admission_document->en_name) }}">
            @error('en_name')
                <span class="danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.grades') }}</label>
            <select name="grade_id[]" class="form-control select2" multiple>
                <option value="">{{ trans('local.select') }}</option>
                @foreach ($grades as $grade)
                    <option
                        {{ in_array($grade->id, $admission_document->grades->pluck('id')->toArray()) ? 'selected' : '' }}
                        value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label>{{ trans('student::local.registration_type') }}</label>
            <select name="registration_type[]" class="form-control select2" multiple required>
                <option {{ preg_match('/\bnew\b/', $admission_document->registration_type) != 0 ? 'selected' : '' }}
                    value="new">{{ trans('student::local.new') }}</option>
                <option
                    {{ preg_match('/\btransfer\b/', $admission_document->registration_type) != 0 ? 'selected' : '' }}
                    value="transfer">{{ trans('student::local.transfer') }}</option>
                <option
                    {{ preg_match('/\breturning\b/', $admission_document->registration_type) != 0 ? 'selected' : '' }}
                    value="returning">{{ trans('student::local.returning') }}</option>
                <option {{ preg_match('/\barrival\b/', $admission_document->registration_type) != 0 ? 'selected' : '' }}
                    value="arrival">{{ trans('student::local.arrival') }}</option>
            </select>
        </div>
    </div>
</div>


<div class="col-lg-2 col-md-3">
    <div class="form-group row">
        <label>{{ trans('student::local.sort') }}</label>
        <input type="number" min="0" step="1" class="form-control @error('sort') is-invalid @enderror"
            placeholder="{{ trans('student::local.sort') }}" name="sort"
            value="{{ old('sort', $admission_document->sort) }}">
        @error('sort')
            <span class="danger">{{ $message }}</span>
        @enderror
    </div>
</div>
