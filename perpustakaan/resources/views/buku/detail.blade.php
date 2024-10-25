<!-- resources/views/buku/detail.blade.php -->
<form action="{{ route('buku.addToWishlist', $buku->id) }}" method="POST">
    @csrf
    <button type="submit">Tambah ke Wishlist</button>
</form>