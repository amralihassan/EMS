<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
      href="#tab1" aria-expanded="true">{{ trans('student::local.father_data') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
      aria-expanded="false">{{ trans('student::local.mother_data') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3"
      aria-expanded="false">{{ trans('student::local.extra_info') }}</a>
    </li>
</ul>
<div class="tab-content px-1 pt-1">
    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
        <h4 class="form-section"> {{ trans('student::local.father_main_data') }}</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.ar_st_name') }}</label>
                  <input type="text" class="form-control " value="{{old('ar_st_name')}}" placeholder="{{ trans('student::local.ar_st_name') }}"
                    name="ar_st_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.ar_nd_name') }}</label>
                  <input type="text" class="form-control " value="{{old('ar_nd_name')}}" placeholder="{{ trans('student::local.ar_nd_name') }}"
                    name="ar_nd_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.ar_rd_name') }}</label>
                  <input type="text" class="form-control " value="{{old('ar_rd_name')}}" placeholder="{{ trans('student::local.ar_rd_name') }}"
                    name="ar_rd_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.ar_th_name') }}</label>
                  <input type="text" class="form-control " value="{{old('ar_th_name')}}" placeholder="{{ trans('student::local.ar_th_name') }}"
                    name="ar_th_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.en_st_name') }}</label>
                  <input type="text" class="form-control " value="{{old('en_st_name')}}" placeholder="{{ trans('student::local.en_st_name') }}"
                    name="en_st_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.en_nd_name') }}</label>
                  <input type="text" class="form-control " value="{{old('en_nd_name')}}" placeholder="{{ trans('student::local.en_nd_name') }}"
                    name="en_nd_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.en_rd_name') }}</label>
                  <input type="text" class="form-control " value="{{old('en_rd_name')}}" placeholder="{{ trans('student::local.en_rd_name') }}"
                    name="en_rd_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.en_th_name') }}</label>
                  <input type="text" class="form-control " value="{{old('en_th_name')}}" placeholder="{{ trans('student::local.en_th_name') }}"
                    name="en_th_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.id_type') }}</label>
                  <select name="father_id_type" class="form-control" >
                      <option value="">{{ trans('student::local.select') }}</option>
                      <option {{old('father_id_type') == 'national_id' ?'selected':''}} value="national_id">{{ trans('student::local.national_id') }}</option>
                      <option {{old('father_id_type') == 'passport' ?'selected':''}} value="passport">{{ trans('student::local.passport') }}</option>
                  </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.id_number') }}</label>
                  <input type="text" min="0" class="form-control " value="{{old('father_id_number')}}" placeholder="{{ trans('student::local.id_number') }}"
                    name="father_id_number">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.religion') }}</label>
                  <select name="father_religion" class="form-control">
                      <option value="">{{ trans('student::local.select') }}</option>
                      <option {{old('father_religion') == 'muslim' ?'selected':''}} value="muslim">{{ trans('student::local.muslim') }}</option>
                      <option {{old('father_religion') == 'non_muslim' ?'selected':''}} value="non_muslim">{{ trans('student::local.non_muslim') }}</option>
                  </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.nationality_id') }}</label>
                  <select name="father_nationality_id" class="form-control ">
                      <option value="">{{ trans('student::local.select') }}</option>
                      @foreach ($nationalities as $nationality)
                          <option {{old('father_nationality_id') == $nationality->id ?'selected' : ''}} value="{{$nationality->id}}">{{$nationality->ar_male_name}}</option>
                      @endforeach
                  </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.job') }}</label>
                <input type="text" class="form-control " value="{{old('father_job')}}" placeholder="{{ trans('student::local.job') }}"
                  name="father_job">
                  <span class="red">{{ trans('student::local.required') }}</span>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.qualification') }}</label>
                <input type="text" class="form-control " value="{{old('father_qualification')}}" placeholder="{{ trans('student::local.qualification') }}"
                  name="father_qualification">
                  <span class="red">{{ trans('student::local.required') }}</span>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.facebook') }}</label>
                <input type="text" class="form-control " value="{{old('father_facebook')}}" placeholder="{{ trans('student::local.facebook') }}"
                  name="father_facebook">
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.whatsapp_number') }}</label>
                <input type="text" class="form-control " value="{{old('father_whatsapp_number')}}" placeholder="{{ trans('student::local.whatsapp_number') }}"
                  name="father_whatsapp_number">
              </div>
          </div>
        </div>

        <h4 class="form-section"> {{ trans('student::local.contacts_data') }}</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.home_phone') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('father_home_phone')}}" placeholder="{{ trans('student::local.home_phone') }}"
                    name="father_home_phone">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.mobile1') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('father_mobile1')}}" placeholder="{{ trans('student::local.mobile1') }}"
                    name="father_mobile1">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.mobile2') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('father_mobile2')}}" placeholder="{{ trans('student::local.mobile2') }}"
                    name="father_mobile2">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.email') }}</label>
                  <input type="email" class="form-control " value="{{old('father_email')}}" placeholder="{{ trans('student::local.email') }}"
                    name="father_email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.block_no') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('father_block_no')}}" placeholder="{{ trans('student::local.block_no') }}"
                    name="father_block_no">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.street_name') }}</label>
                  <input type="text" class="form-control " value="{{old('father_street_name')}}" placeholder="{{ trans('student::local.street_name') }}"
                    name="father_street_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.state') }}</label>
                  <input type="text" class="form-control " value="{{old('father_state')}}" placeholder="{{ trans('student::local.state') }}"
                    name="father_state">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.government') }}</label>
                  <input type="text" class="form-control " value="{{old('father_government')}}" placeholder="{{ trans('student::local.government') }}"
                    name="father_government">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
        <h4 class="form-section"> {{ trans('student::local.mother_main_data') }}</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.mother_full_name') }}</label>
                  <input type="text" class="form-control " value="{{old('full_name')}}" placeholder="{{ trans('student::local.mother_full_name') }}"
                    name="full_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.id_type') }}</label>
                  <select name="mother_id_type_m" class="form-control">
                      <option value="">{{ trans('student::local.select') }}</option>
                      <option {{old('mother_id_type') == 'national_id' ?'selected':''}} value="national_id">{{ trans('student::local.national_id') }}</option>
                      <option {{old('mother_id_type') == 'passport' ?'selected':''}} value="passport">{{ trans('student::local.passport') }}</option>
                  </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.id_number') }}</label>
                  <input type="text" class="form-control " value="{{old('mother_id_number')}}" placeholder="{{ trans('student::local.id_number') }}"
                    name="mother_id_number">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.religion') }}</label>
                  <select name="mother_religion" class="form-control">
                    <option value="">{{ trans('student::local.select') }}</option>
                    <option {{old('mother_religion') == 'muslim' ?'selected':''}} value="muslim">{{ trans('student::local.muslim_m') }}</option>
                    <option {{old('mother_religion') == 'non_muslim' ?'selected':''}} value="non_muslim">{{ trans('student::local.non_muslim_m') }}</option>
                </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.nationality_id') }}</label>
                  <select name="mother_nationality_id" class="form-control ">
                      <option value="">{{ trans('student::local.select') }}</option>
                      @foreach ($nationalities as $nationality)
                          <option {{old('mother_nationality_id') == $nationality->id ?'selected' : ''}} value="{{$nationality->id}}">{{$nationality->ar_female_name}}</option>
                      @endforeach
                  </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.job') }}</label>
                <input type="text" class="form-control " value="{{old('mother_job')}}" placeholder="{{ trans('student::local.job') }}"
                  name="mother_job">
                  <span class="red">{{ trans('student::local.required') }}</span>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.qualification') }}</label>
                <input type="text" class="form-control " value="{{old('mother_qualification')}}" placeholder="{{ trans('student::local.qualification') }}"
                  name="mother_qualification">
                  <span class="red">{{ trans('student::local.required') }}</span>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.facebook') }}</label>
                <input type="text" class="form-control " value="{{old('mother_facebook')}}" placeholder="{{ trans('student::local.facebook') }}"
                  name="mother_facebook">
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="form-group">
                <label>{{ trans('student::local.whatsapp_number') }}</label>
                <input type="text" class="form-control " value="{{old('mother_whatsapp_number')}}" placeholder="{{ trans('student::local.whatsapp_number') }}"
                  name="mother_whatsapp_number">
              </div>
          </div>
        </div>
        <h4 class="form-section"> {{ trans('student::local.contacts_data') }}</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.home_phone') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('mother_home_phone')}}" placeholder="{{ trans('student::local.home_phone') }}"
                    name="mother_home_phone">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.mobile1') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('mother_mobile1')}}" placeholder="{{ trans('student::local.mobile1') }}"
                    name="mother_mobile1">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.mobile2') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('mother_mobile2')}}" placeholder="{{ trans('student::local.mobile2') }}"
                    name="mother_mobile2">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.email') }}</label>
                  <input type="email" min="0" class="form-control " value="{{old('mother_email')}}" placeholder="{{ trans('student::local.email') }}"
                    name="mother_email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.block_no') }}</label>
                  <input type="number" min="0" class="form-control " value="{{old('mother_block_no')}}" placeholder="{{ trans('student::local.block_no') }}"
                    name="mother_block_no">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.street_name') }}</label>
                  <input type="text" class="form-control " value="{{old('mother_street_name')}}" placeholder="{{ trans('student::local.street_name') }}"
                    name="mother_street_name">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.state') }}</label>
                  <input type="text" class="form-control " value="{{old('mother_state')}}" placeholder="{{ trans('student::local.state') }}"
                    name="mother_state">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <label>{{ trans('student::local.government') }}</label>
                  <input type="text" class="form-control " value="{{old('mother_government')}}" placeholder="{{ trans('student::local.government') }}"
                    name="mother_government">
                    <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
        <h4 class="form-section"> {{ trans('student::local.extra_info') }}</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label>{{ trans('student::local.educational_mandate') }}</label>
                  <select name="educational_mandate" class="form-control">
                      <option value="">{{ trans('student::local.select') }}</option>
                      <option {{old('educational_mandate') == 'father' ?'selected':''}} value="father">{{ trans('student::local.father') }}</option>
                      <option {{old('educational_mandate') == 'mother' ?'selected':''}} value="mother">{{ trans('student::local.mother') }}</option>
                  </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>{{ trans('student::local.marital_status') }}</label>
                  <select name="marital_status" class="form-control">
                      <option value="">{{ trans('student::local.select') }}</option>
                      <option {{old('marital_status') == 'married' ?'selected':''}} value="married">{{ trans('student::local.married') }}</option>
                      <option {{old('marital_status') == 'divorced' ?'selected':''}} value="divorced">{{ trans('student::local.divorced') }}</option>
                      <option {{old('marital_status') == 'separated' ?'selected':''}} value="separated">{{ trans('student::local.separated') }}</option>
                      <option {{old('marital_status') == 'widower' ?'selected':''}} value="widower">{{ trans('student::local.widower') }}</option>
                  </select>
                  <span class="red">{{ trans('student::local.required') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>{{ trans('student::local.recognition') }}</label>
                  <select name="recognition" class="form-control">
                      <option value="">{{ trans('student::local.select') }}</option>
                      <option {{old('recognition') == 'facebook' ?'selected':''}} value="facebook">{{ trans('student::local.fb') }}</option>
                      <option {{old('recognition') == 'parent' ?'selected':''}} value="parent">{{ trans('student::local.parent') }}</option>
                      <option {{old('recognition') == 'street' ?'selected':''}} value="street">{{ trans('student::local.street') }}</option>
                      <option {{old('recognition') == 'school_hub' ?'selected':''}} value="school_hub">{{ trans('student::local.school_hub') }}</option>
                  </select>
                </div>
            </div>
        </div>
    </div>
</div>
