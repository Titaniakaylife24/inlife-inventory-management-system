<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-2xl font-bold mb-6">

Edit Profile

</h2>

<form
method="post"
action="{{ route('profile.update') }}">

@csrf
@method('patch')

<div class="mb-6">

<label class="font-semibold">

Name

</label>

<input
type="text"
name="name"
value="{{ old('name',$user->name) }}"
class="w-full rounded-xl border-slate-300">

</div>

<div class="mb-6">

<label class="font-semibold">

Email

</label>

<input
type="email"
name="email"
value="{{ old('email',$user->email) }}"
class="w-full rounded-xl border-slate-300">

</div>

<button
class="px-6 py-3 rounded-xl
bg-gradient-to-r
from-pink-500
to-purple-600
text-white">

Save Changes

</button>

</form>

</div>