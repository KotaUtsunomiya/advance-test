<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理システム</title>
    <link rel="stylesheet" href="{{ asset('css/reset-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management-style.css') }}">
</head>
<body>
  <h1 class="title">管理システム</h1>
  <div class="content">
  <div class="search-area">
      <form action="{{ route('management') }}" method='get' class="search-area-form">
        @csrf
        <ul class="form-ul">
          <li class="form-li li-name">
            <label class="form-label">お名前</label>
            <input type="text" name="name" class="form-input input-name">
          </li>
          <li class="form-li li-gender">
            <label class="form-label label-gender">性別</label>
            <input type="radio" name="gender" value="" checked id="all" class="radio">
            <label for="all" class="radio-rabel">全て</label>
            <input type="radio" name="gender" value="1" id="male" class="radio">
            <label for="male" class="radio-rabel">男性</label>
            <input type="radio" name="gender" value="2" id="female" class="radio">
            <label for="female" class="radio-rabel">女性</label>
          </li>
          <li class="form-li li-date">
            <label class="form-label">登録日</label>
            <input type="date" name="start-date" class="form-input input-first-date">
            <span class="hyphen-mark">~</span>
            <input type="date" name="last-date" class="form-input input-last-date">
          </li>
          <li class="form-li li-email">
            <label class="form-label">メールアドレス</label>
            <input type="text" name="email" class="form-input">
          </li>
        </ul>
        <input type="submit" name="search" value="検索" class="search-btn">
      </form>
      <a href="{{ route('management') }}" class="reset-btn">リセット</a>
    </div>
    @isset($contacts)
    {{ $contacts->appends(['name' => $params['name'] ?? '' , 'gender' => $params['gender'] ?? '', 'start-date' => $params['start-date'] ?? '', 'last-date' => $params['last-date'] ?? '', 'email' => $params['email'] ?? '', 'search' => $params['search'] ?? ''])->links('vendor.pagination.tailwind') }}
        <table class="search-result-table">
            <tr class="table-tr tr-head">
              <th class="th-id">ID</th>
              <th class="th-name">お名前</th>
              <th class="th-gender">性別</th>
              <th class="th-email">メールアドレス</th>
              <th class="th-opinion">ご意見</th>
              <th class="th-delete-btn"></th>
            </tr>
            @foreach($contacts as $contact)
            <form action="{{ route('delete', ['contact'=>$contact->id]) }}" method="post" class="search-result-form">
              @csrf
              <tr class="table-tr">
                <td class="td-id">{{ $contact->id }}</td>
                <td class="">{{ $contact->fullname }}</td>
                @if($contact->gender == "1")
                  <td class="">男性</td>
                @else
                  <td class="">女性</td>
                @endif
                <td class="td-email">{{ $contact->email }}</td>
                <td title="{{ $contact->opinion }}" class="td-opinion">{{ $contact->opinion }}</td>
                <td class="td-delet-btn">
                  <button type="submit" class="delete-btn">削除</button>
                </td>
              </tr>
            </form>
            @endforeach
          </div>
        </table>
    @endisset
</body>
