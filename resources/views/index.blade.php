<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Font Awesome -->
   <link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
 />
 <!-- Google Fonts Roboto -->
 <link
   rel="stylesheet"
   href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
 />
 <!-- MDB -->
 <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
  <title>Document</title>
</head>
<body>
  <div class= "container">
    <div class="row mt-4">
      <div class="col-md-8">
        <table class="table table-sm">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kitap Adı</th>
                    <th scope="col">Kodu</th>
                    <th scope="col">Yazar</th>
                    <th scope="col">İşlemler</th>



                </tr>
            </thead>

            <tbody>
                @foreach ($books as $key => $book )
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <th scope="col">{{ $book->name }}</th>
                    <th scope="col">{{ $book->book_code }}</th>
                    <th scope="col">{{ $book->author }}</th>
                     <th>
                        <a href="{{ route('book_delete', ['id'=>$book->id]) }}" class="btn btn-sm btn-danger">SİL</a>
                        <span style="margin-right: 10px;"></span>

                        <a href="{{ route('get_book_edit', ['id'=>$book->id]) }}" class="btn btn-sm btn-info">DÜZENLE</a>

                     </th>
                </tr>
                @endforeach

            </tbody>
          </table>
      </div>
      <div class="col-md-4">
           <form method="POST" action="{{  isset($firstBook) ? url('book/edit') : url('book/store') }}">
             @csrf
             <div class="form-outline mb-4">
                <input type="text" id="name" name="name" value="{{ isset($firstBook) ? $firstBook->name : "" }}" class="form-control" />
                <label class="form-label" for="name">Kitap Adı</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="book_code" name="book_code"  value="{{ isset($firstBook) ? $firstBook->book_code : "" }}" class="form-control" />
                <label class="form-label" for="book_code">Kitap Kodu</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="author" name="author"  value="{{ isset($firstBook) ? $firstBook->author : "" }}" class="form-control" />
                <label class="form-label" for="author">Yazar</label>
              </div>
              {!! isset($firstBook) ? '<input type="hidden" name="book_id" value=" ' .$firstBook->id. ' ">' : ''!!}
              <input type="submit" name="kaydet"  value="{{ isset($firstBook) ? 'GÜncelle' : 'Kaydet'}}" class="btn btn-info">
              <span style="margin-right: 10px;"></span>
              <a href="{{ route('index') }}" class="btn btn-info">İPTAL ET</a>

           </form>
      </div>

    </div>

  <div>
    <h4><span class="badge bg-info">{{ "Kitap Sayısı: ".$bookCount }}</span> </h4>

  </div>
  </div>
</body>
 <!-- MDB -->
 <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
</html>
