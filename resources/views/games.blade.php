<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("style.css")}}>
    <title>Home</title>
  </head>
  
  <body>
    <center><h1>Data Game of The Year</h1><center>
    <center><a href="{{route('create')}}">+  &nbsp;Tambah Data + &nbsp;</a><center>
	

    <br/>
    <table>
      <thead>
        <tr>
			<!-- <th>No</th> -->
			<!-- <th>Gambar</th> -->
      <th>NO</th>
			<th>Judul</th>
			<th>Tahun</th>
			<th>Pengembang</th>
      <!-- <th>Mesin</th> -->
			<th>Platform</th>
      <th>Aksi</th>
			<!-- <th>Aksi</th> -->
        </tr>
    </thead>
    <tbody>


        @foreach ($games as $game)
        <tr>
            <th scope="row">{{ $game->id }}</th>
            <td>{{ $game->judul }}</td>
            <td>{{ $game->tahun }}</td>
            <td>{{ $game->publisher->pengembang }}</td>
            <!-- <td>{{ $game->publisher->mesin }}</td> -->
            <td>{{ $game->platform }}</td>
            <td>
              <div style="display:flex; width: 9vh;">
              <a href="/show/{{ $game->id }}" class="">Lihat</a> || 
              <a href="/games/{{$game->id}}/edit" class="">Edit</a> ||
              <form action="{{ route('delete', $game->id) }}" method="post" style="display inline" onsubmit="confirm('Apakah Anda yakin ingin menghapus data game {{$game->judul}}?')">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger mb-3">Delete</button>
              </form>
              </div>
            </td>
            {{-- Cukup Panggil seperti di atas --}}
        </tr>

        @endforeach
	  
 
    </tbody>
    </table>
    <a href="{{ Auth::user() ? '/logout' : '/login' }}"  >
                    {{ Auth::user() ? 'Logout' : 'Login' }}
                </a>
    <a style="margin-left: 12px;" href="/"  >
        Kembali
    </a>
    
    <!-- <form action="logout.php" method="post">
        <button type="submit" name="logout">logout</button>
    </form> -->
  </body>
  
</html>




