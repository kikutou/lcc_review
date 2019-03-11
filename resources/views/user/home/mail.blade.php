<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>この度、LCCの記事購読にお申し込み頂きまして</h1>
    <h2>誠にありがとうございます。</h2>
    <p>お申し込み頂きましたアカウント情報は以下となります。</p>

    <p>ご購読情報:</p>

    <p>航空会社名:</p>

    @if($mail->brands)
    @foreach($mail->brands as $brand)

    {{ $brand->brand_name }}

    @endforeach
    @else
    <p>ご購読された航空会社がございません</p>
    @endif


    <p>カテゴリー名:</p>
    @if($mail->categories)
    @foreach($mail->categories as $category)

    {{ $category->category_name }}

    @endforeach
    @else
    <p>ご購読されたカテゴリーがございません</p>
    @endif


    <p>上記の内容がよろしければ、<br>
    下記URLへ「24時間以内」にアクセスし、</p>
    <p>アカウントの本登録を完了させて下さい。</p>

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

  </body>
</html>
