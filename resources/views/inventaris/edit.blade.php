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
            <form action="{{route('inventaris.update', $inventaris->id_inventaris)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input value="{{$inventaris->nama}}" type="text" id="name" name="nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Keterangan</label>
                    <input value="{{$inventaris->keterangan}}" type="text" id="quantity" name="keterangan" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Jumlah</label>
                    <input value="{{$inventaris->jumlah}}" type="number" id="quantity" name="jumlah" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price</label>
                    <select name="id_ruang" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($ruang as $item)
                            <option value="{{ $item->id_ruang }}" {{$inventaris->id_ruang == $item->id_ruang ? 'selected' : ''}}>{{ $item->nama_ruang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Tanggal Register</label>
                    <input value="{{$inventaris->tanggal_register}}" type="date" id="quantity" name="tanggal_register" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>