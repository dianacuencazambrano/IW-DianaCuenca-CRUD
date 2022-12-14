@csrf
<hr width="1000x">
<label>
    <h3>Reinforcement Information</h3>
</label>

<div class="mb-3">
    <label for="id_skill">Skill</label><br>
    <select name="id_skill" id="id_skill" required>
        <option value="" selected>Select a Skill</option>
        @foreach ($skills as $skill)
            @if ($reinforcement ?? null)
                @if ($skill->id_skill == $reinforcement->id_skill)
                    @php($selected = 'selected')
                @else
                    @php($selected = '')
                @endif
            @else
                @php($selected = '')
            @endif
            <option value="{{ $skill->id_skill }}" {{ $selected }}>
                {{ $skill->title_skill }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <input name="title_rein" type="text" placeholder="Title"
        value="{{ old('title_rein', $reinforcement->title_rein ?? null) }}" required><br>
</div>
<div class="mb-3">
    <textarea name="description_rein" type="text" placeholder="Description"
        value="{{ old('description_rein', $reinforcement->description_rein ?? null) }}" required>{{ $reinforcement->description_rein ?? null }}</textarea><br>
</div>
