<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>この度、LCCの記事購読にお申し込み頂きまして</h2>
    <h3>誠にありがとうございます。</h3>
    <div>
      <p>お申し込み頂きましたご購読情報は以下となります。</p><br>
      航空会社名:
      <br>
      @if(count($mail->brands) != 0)
      @foreach($mail->brands as $brand)

      {{ $brand->brand_name }}

      @endforeach
      <br>
      @else
      ご購読された航空会社がございません<br>
      @endif
      <br>

      カテゴリー名:
      <br>
      @if(count($mail->categories) != 0)
      @foreach($mail->categories as $category)

      {{ $category->category_name }}

      @endforeach
      <br>
      @else
      ご購読されたカテゴリーがございません<br>
      @endif

      <br>
      上記の内容がよろしければ、下記URLへ「24時間以内」にアクセスし、<br>
      アカウントの本登録を完了させて下さい。<br>

      <p>{{ $token }}</p>

      <small>
        ※当メール送信後、24時間を超過しますと、セキュリティ保持のため有効期限切れとなります。
        その場合は再度、購読手続きをお願い致します。
        <br>
        ※お使いのメールソフトによってはURLが途中で改行されることがあります。その場合は、最初の「http://」から末尾の英数字までをブラウザに直接コピー＆ペーストしてアクセスしてください。
        <br>
        ※当メールは送信専用メールアドレスから配信されています。
        このままご返信いただいてもお答えできませんのでご了承ください。
        <br>
        ※当メールに心当たりの無い場合は、誠に恐れ入りますが
        破棄して頂けますよう、よろしくお願い致します。
      </small>
    </div>
  </body>
</html>
