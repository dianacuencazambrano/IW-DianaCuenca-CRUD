@csrf
<hr width="1000x">
<label>
    <h3>Basic Information</h3>
</label>
 
@if (auth()->user()->role->id_role == 2)
    @php($role = 3)
    <input name="id_role" type="" value="{{ $role }}"><br>
    <input name="id_class" type="" value="{{ $teacher[0]->id_class }}"><br>
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
<label>Login Information</label>
<div class="mb-3">
    <input name="email" type="email" placeholder="Email" value="{{ old('email', $user->email ?? null) }}"
        required><br>
</div>
{{-- <div class="mb-3">
    <input name="confirmPassword" type="password" placeholder="Confirm password" required><br>
</div> --}}
