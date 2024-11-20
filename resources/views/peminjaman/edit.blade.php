<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white p-5 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-5 text-center">Create Inventaris</h2>
            <form action="{{route('peminjaman.update', $peminjaman->id_peminjaman)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Barang</label>
                    <select name="id_inventaris" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($inventaris as $b)
                            <option value="{{ $b->id_inventaris }}" {{$peminjaman->id_inventaris == $b->id_inventaris ? "selected" : ""}}>{{ $b->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Jumlah</label>
                    <input value="{{$peminjaman->jumlah}}" type="number" id="quantity" name="jumlah" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Tanggal Pinjam</label>
                    <input value="{{$peminjaman->tanggal_pinjam}}" type="date" id="quantity" name="tanggal_pinjam" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Tanggal Kembali</label>
                    <input value="{{$peminjaman->tanggal_kembali}}" type="date" id="quantity" name="tanggal_kembali" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Status</label>
                    <select name="status_peminjaman" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="dipinjam" {{$peminjaman->status_peminjaman == "Dipinjam" ? "selected" : ""}}>Dipinjam</option>
                        <option value="dikembalikan" {{$peminjaman->status_peminjaman == "Dikembalikan" ? "selected" : ""}}>Dikembalikan</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>