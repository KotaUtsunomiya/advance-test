<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/reset-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index-style.css') }}">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/kana_change.js') }}"></script>
</head>
<body>
  <h1 class="title">お問い合わせ</h1>
  <form action="{{ route('contact.confirm') }}" method="post" class="form">
    @csrf
    <table class="form-table">
      <tr class="table-tr">
        <th class="table-th">
          お名前 <span class="require-mark">※</span>
        </th>
        <td class="table-td td-family-name">
          <input type="text" name="family-name" value="{{ old('family-name') }}" required class="form-input form-family-name">
          <p class="sample">例）山田</p>
          @if($errors->has('family-name'))
            <div class="error">
              <p>{{ $errors->first('family-name') }}</p>
            </div>
          @endif
        </td>
        <td class="table-td td-given-name">
          <input type="text" name="given-name" value="{{ old('given-name') }}" required class="form-input form-given-name">
          <p class="sample">例）太郎</p>
          @if($errors->has('given-name'))
            <div class="error">
              <p>{{ $errors->first('given-name') }}</p>
            </div>
          @endif
        </td>
      </tr>

      <tr class="table-tr tr-gender">
        <th class="table-th">
          性別 <span class="require-mark">※</span>
        </th>
        <td colspan="2" class="table-td">
          <input type="radio" name="gender" value="1" {{ old('gender','1') == '1' ? 'checked' : '' }} required id="male" class="radio">
          <label for="male" class="radio-rabel">男性</label>
          <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} id="female" class="radio">
          <label for="female" class="radio-rabel">女性</label>
          @if($errors->has('gender'))
            <div class="error">
              <p>{{ $errors->first('gender') }}</p>
            </div>
          @endif
        </td>

      </tr>

      <tr class="table-tr">
        <th class="table-th">
          メールアドレス <span class="require-mark">※</span>
        </th>
        <td colspan="2" class="table-td">
          <input type="email" name="email" value="{{ old('email') }}" required class="form-input">
          <p class="sample">例）test@example.com</p>
          @if($errors->has('email'))
            <div class="error">
              <p>{{ $errors->first('email') }}</p>
            </div>
          @endif
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          郵便番号 <span class="require-mark">※</span>
        </th>
        <td colspan="2" class="table-td td-postcode">
          <label for="postcode" class="post-mark">〒
            <input type="text" name="postcode" value="{{ old('postcode') }}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" id="postcode" required class="form-input form-postcode">
          </label>
          <p class="sample sample-postcode">例）123-4567</p>
          @if($errors->has('postcode'))
            <div class="error error-postcode">
              <p>{{ $errors->first('postcode') }}</p>
            </div>
          @endif
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          住所 <span class="require-mark">※</span>
        </th>
        <td colspan="2" class="table-td">
          <input type="text" name="address" value="{{ old('address') }}" required class="form-input">
          <p class="sample">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          @if($errors->has('address'))
            <div class="error">
              <p>{{ $errors->first('address') }}</p>
            </div>
          @endif
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th">
          建物名</span>
        </th>
        <td colspan="2" class="table-td">
          <input type="text" name="building-name" value="{{ old('building-name') }}" class="form-input">
          <p class="sample">例）千駄ヶ谷マンション101</p>
        </td>
      </tr>

      <tr class="table-tr">
        <th class="table-th th-opinion">
          ご意見 <span class="require-mark">※</span>
        </th>
        <td colspan="2" class="table-td">
          <textarea name="opinion" required class="form-textarea">{{ old('opinion') }}</textarea>
          @if($errors->has('opinion'))
            <div class="error">
              <p>{{ $errors->first('opinion') }}</p>
            </div>
          @endif
        </td>
      </tr>
    </table>
    <button type="submit" class="confirm-btn">確認</button>
</body>


