@csrf
<hr width="1000x">
<label>
    <h3>Basic Information</h3>
</label>
 
@if (auth()->user()->role->id_role == 2)
    @php($role = 3)
    <input name="id_role" type="hidden" value="{{ $role }}"><br>
    {{-- @php($class = auth()->user()->)
    <input name="id_class" type="" value="{{ $class }}"><br> --}}
@endif

@if (auth()->user()->id_role == 1)
    <div class="mb-3">
        <label for="id_role">Role</label><br>
        <select name="id_role" id="id_role" required>
            <option value="" selected>Select a Role</option>
            @foreach ($roles as $role)
                @if ($user ?? null)
                    @if ($role->id_role == $user->id_role)
                        @php($selected = 'selected')
                    @else
                        @php($selected = '')
                    @endif
                @else
                    @php($selected = '')
                @endif
                <option value="{{ $role->id_role }}" {{ $selected }}>
                    {{ $role->name_role }}
                </option>
            @endforeach
        </select>
    </div>
@endif

<div class="mb-3">
    <input name="name" type="" placeholder="Name" value="{{ old('name', $user->name ?? null) }}" required><br>
</div>
<div class="mb-3">
    <input name="lastname" type="text" placeholder="Last name" value="{{ old('lastname', $user->lastname ?? null) }}"
        required><br>
</div>
<div class="mb-3">
    <input name="birthday" type="date" placeholder="Birthday date"
        value="{{ old('birthday', $user->birthday ?? null) }}" required><br>
</div>
<div class="mb-3">
    <input name="identification" type="number" placeholder="Identification"
        value="{{ old('identification', $user->identification ?? null) }}" required><br>
</div>
<div class="mb-3">
    <input name="phoneNumber" type="tel" placeholder="Phone Number"
        value="{{ old('phoneNumber', $user->phoneNumber ?? null) }}" required><br>
</div>
<div class="mb-3">
    <textarea name="homeAddress" type="number" placeholder="Home Address"
        value="{{ old('homeAddress', $user->homeAddress ?? null) }}" required>{{ $user->homeAddress ?? null }}</textarea><br>
</div>
<div class="mb-3">
    @if (auth()->user()->role->id_role == 1)
        <div class="mb-3">
            <label for="id_class">Class</label><br>
            <select name="id_class" id="id_class" required>
                <option value="" selected>Select a class</option>
                @foreach ($classes as $class)
                    @if ($user ?? null)
                        @if ($class->id_class == $user->id_class)
                            @php($selected = 'selected')
                        @else
                            @php($selected = '')
                        @endif
                    @else
                        @php($selected = '')
                    @endif
                    <option value="{{ $class->id_class }}" {{ $selected }}>
                        {{ $class->level_class . ' ' . $class->identifier_class }}
                    </option>
                @endforeach
            </select>
        </div>
    @endif
</div>
<label>Login Information</label>
<div class="mb-3">
    <input name="email" type="email" placeholder="Email" value="{{ old('email', $user->email ?? null) }}"
        required><br>
</div>
@if (auth()->user()->id_role == 1)
    

    <div class="mb-3">
        <input name="password" type="password" placeholder="Password" required><br>
    </div>
@endif
{{-- <div class="mb-3">
    <input name="confirmPassword" type="password" placeholder="Confirm password" required><br>
</div> --}}
