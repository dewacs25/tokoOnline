<div>
    <h4>Hallo {{ Auth::guard('users')->user()->email }}</h4>

    <p>{{ $t->nama_toko }}</p>

    <p>{{ $t->user->email }}</p>
</div>
