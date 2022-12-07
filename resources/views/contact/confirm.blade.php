<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/reset-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm-style.css') }}">
</head>
<body>
  <h1 class="title">内容確認</h1>
  <form action="{{ route('contact.send') }}" method="post" name="form1" class="form">
    @csrf
    <table class="form-table">
      <tr class="table-tr">
        <th class="table-th">
          お名前
        </th>
        <td class="table-td">
          {{ $inputs['family-name'] }}&emsp;{{ $inputs['given-name'] }}
          <input type="hidden" name="family-name" value="{{ $inputs['family-name'] }}">
          <input type="hidden" name="given-name" value="{{ $inputs['given-name'] }}">
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          性別
        </th>
        <td class="table-td">
          @if($inputs['gender'] == 1)
            男性
          @elseif($inputs['gender'] == 2)
            女性
          @endif
          <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          メールアドレス
        </th>
        <td class="table-td">
          {{ $inputs['email'] }}
          <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          郵便番号
        </th>
        <td class="table-td">
          {{ $inputs['postcode'] }}
          <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}">
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          住所
        </th>
        <td class="table-td">
          {{ $inputs['address'] }}
          <input type="hidden" name="address" value="{{ $inputs['address'] }}">
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          建物名
        </th>
        <td class="table-td">
          {{ $inputs['building-name'] }}
          <input type="hidden" name="building-name" value="{{ $inputs['building-name'] }}">
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          ご意見
        </th>
        <td class="table-td">
          {{ $inputs['opinion'] }}
          <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
        </td>
      </tr>
    </table>

    <input type="submit" name="action" value="送信" class="send-btn">
  </form>
  <input type="hidden" name="action" value="修正する"><a href="javascript:form1.submit()" class="fix-btn">修正する</a>
</body>

