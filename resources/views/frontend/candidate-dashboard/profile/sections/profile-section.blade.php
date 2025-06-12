<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <form action="{{ route('candidate.profile.profile-info.update') }}" class="form-group mt-4" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Gender *</label>

                            <select name="gender"
                                class="form-icons select-active {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                                id="">
                                <option value="">Select One</option>
                                <option @selected($candidate?->gender === 'male') value="male">Male</option>
                                <option @selected($candidate?->gender === 'female') value="female">Female</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Marital Status *</label>

                            <select name="marital_status"
                                class="form-icons select-active {{ $errors->has('marital_status') ? 'is-invalid' : '' }}"
                                id="">
                                <option value="">Select One</option>
                                <option @selected($candidate?->marital_status === 'unmarried') value="unmarried">Single</option>
                                <option @selected($candidate?->marital_status === 'married') value="married">Married</option>
                            </select>
                            <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Profession *</label>

                            <select name="profession"
                                class="form-icons select-active {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                                id="">
                                <option value="">Select One</option>
                                @foreach ($professions as $profession)
                                    <option @selected($profession->id === $candidate?->profession_id) value="{{ $profession->id }}">
                                        {{ $profession->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Your Availability *</label>

                            <select name="availability"
                                class="form-icons select-active {{ $errors->has('availability') ? 'is-invalid' : '' }}"
                                id="">
                                <option value="">Select One</option>
                                <option @selected($candidate?->status === 'available') value="available">Available</option>
                                <option @selected($candidate?->status === 'unavailable') value="unavailable">Not Available</option>
                            </select>
                            <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label for="skills_you_have" class="font-sm color-text-muted mb-10">Skills you have
                                *</label>
                            <select name="skills_you_have[]" id="skills_you_have"
                                class="form-icons select-active form-control {{ $errors->has('skills_you_have') ? 'is-invalid' : '' }}"
                                multiple>
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill?->id }}" @selected(in_array($skill?->id, $candidate?->skill->pluck('skill_id')->toArray() ?? []))>
                                        {{ $skill?->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('skills_you_have')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label for="language_you_know" class="font-sm color-text-muted mb-10">Languages you know
                                *</label>
                            <select name="language_you_know[]" id="language_you_know"
                                class="form-icons select-active form-control {{ $errors->has('language_you_know') ? 'is-invalid' : '' }}"
                                multiple>
                                @foreach ($languages as $language)
                                    <option value="{{ $language?->id }}" @selected(in_array($language?->id, $candidate?->language->pluck('language_id')->toArray() ?? []))>
                                        {{ $language?->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('language_you_know')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10 " id="editor">Biography *</label>
                            <textarea name="biography">{!! $candidate?->bio !!}</textarea>
                            <x-input-error :messages="$errors->get('biography')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>

            <div class="box-button mt-15">
                <button class="btn btn-apply-big font-md font-bold" name="save">Save All
                    Changes</button>
            </div>

        </div>
    </form>

</div>
