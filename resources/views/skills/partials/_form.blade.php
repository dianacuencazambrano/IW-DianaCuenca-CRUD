@csrf
<hr width="1000x">
<label>
    <h3>Skill Information</h3>
</label>

<div class="mb-3">
    <input name="title_skill" type="text" placeholder="Title"
        value="{{ old('title_skill', $skill->title_skill ?? null) }}" required><br>
</div>
<div class="mb-3">
    <textarea name="description_skill" type="text" placeholder="Description"
        value="{{ old('description_skill', $skill->description_skill ?? null) }}" required>{{ $skill->description_skill ?? null }}</textarea><br>
</div>
