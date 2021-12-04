◯PHP  
・PHPは <?php で始まり ?> で終わる書き方をします。終了タグについては、後続にHTMLなどがない限り省略もできますが、処理が分かりにくくなるので、始まりと終わりは一対一で書くようにしましょう。
・コメントアウトは/* */ //などで行います。大きな処理の塊ごとに、その処理は何を意味するのかコメントアウトで簡単に書いておくと、後から見やすいコードになります。
・PHPの型
boolean、integer、float、double、string、array、objectなどがあります。それぞれPHP独特のものは少なく、書き方こそ違えど、他のプログラム言語と同様の感覚で使うことができます。
なおPHPでは、明示で型を指定せずとも、値を入れた時点で自動的に決まります。これは、特に初心者のうちは型をあまり意識せずプログラミングができるので便利に感じます。一方で中級者以上になってくると、自動で決まってしまう型をしっかり理解していないと思わぬバグを生んでしまうため注意が必要です。
・変数や配列には$がつき、定数にはつかないのが特徴です。
・改行にはPHP_EOL を使う。
・文字列を扱うときはダブルクォーテーションかシングルクォーテーションでくくります。ダブルクォーテーションでは、中に記述された変数を展開しますが、シングルクォーテーションでは変数が処理されずに、そのまま文字列として表示されるという違いがあります。
// 変数代入
$test_str = "test";
$test_int = 123;

// 配列の場合
$test_array = [1,2,3,4,5];
・関数はclassとfunctionを使って定義していきます。classは文字通り、クラスを宣言するもの、functionは関数を宣言するものになります
// 関数
function test_func() {
    $test_str = "test";
    return $test_str;
}
echo test_func(); // test が表示される
→testという文字列を、変数$test_strに代入し、それを表示させています。

// クラス
Class test_class {
    public function add($a,$b) {
        echo $a + $b;
    }
}

$tc = new test_class();
$tc->add(10,20); // 10 + 20 の結果である 30 が表示される
→test_classを定義した後、$tcにインスタンスを生成し、->（アロー）でadd関数を呼び出します。

・変数名として使えるのは、以下を組み合わせた文字列となります。
小文字の英字
大文字の英字
数字
アンダースコア
ただし、数字は１文字目には使えないので注意しましょう。
・echo は「出力する」
・一括コンパイル（プログラムの中身をコンピュータが分かる言葉に翻訳すること）せず、実行時に一行ずつコンパイルするため、コーディングしてすぐ動作の確認が可能。  
・インタプリタ言語（人間が書いたプログラム（ソースコード）をコンピュータが実行する際に１行ずつコンピュータが読み取りやすいように機械語に翻訳していきながら、そのプログラムを実行していく方式を持つプログラミング言語）  

・PHPは、HTML内に直接書き込むことができる。  
例  
<html><div> <?php print("Hello World");?> </div></html>  
「print」は、引数を出力する関数  
末尾の;はプログラムの行の終わりを意味する。  

・foreach文の書式1
<?php
foreach ( <配列の変数> as <各要素が格納される変数> ) {
  // ループ処理をここへ記述
}
?>

<?php
$fruits = [ “りんご”, “オレンジ”, “ぶどう” ];
foreach ( $fruits as $fruit ) {
  print $fruit. “<br>”;
}
?>
このコードを実行すると
りんご
オレンジ
ぶどう
と表示される。


<?php
$fruits = [ “apple” => “りんご” , ”orange” => “オレンジ”, ”grape” => “ぶどう” ];
foreach($fruit as $key => $value){
  print $value . ”は英語で書くと” . $key . “です<br>”;
}
?>
このコードを実行すると
りんごは英語で書くとappleです
オレンジは英語で書くとorangeです
ぶどうは英語で書くとgrapeです
と表示される。

◯配列
<?php
    // 配列を宣言する
    $array = array(
          '1人目のsamurai',
          '2人目のsamurai',
          '3人目のsamurai'
    );
    // 配列の1つの目の要素を表示する
    echo $array[0];
?>
1人目のsamurai

（短縮）
<?php
    $array = [
        '1人目のsamurai',
        '2人目のsamurai',
        '3人目のsamurai'
    ];
    // 配列の3つの目の要素を表示する
    echo $array[2];
?>
3人目のsamurai

<?php
    // 配列を宣言する
    $array = array(
        'first'      => '1人目のsamurai',
        'second'  => '2人目のsamurai',
        'third'     => '3人目のsamurai'
    );
       
    // 配列のキーが’first’の要素を表示する
    echo $array['first'];
?>
1人目のsamurai



◯PHPで条件分岐（if）  
<?php
    $num = 1;
    if ($num === 1) {
        print("これは1です");
    } else if ($num === 2) {
        print("これは2です");
    } else {
        print("これは1でも2でもありません");
    }
?>

「===」と「!==」の等号や不等号は、値と「データ型」まで含めた完全一致か不完全一致かを判定します。
データ型とは、データの種類のことですが、簡単に言えば、文字、数値（整数）、数値（実数＝小数点を含む値）、論理（TrueかFalseか、YesかNoか、真か偽か）といったデータの性格です。たとえば数値としての「123」は整数として扱いますし、画面に表示されるような文字「abc」は文字として扱います。ですので、文字としての「123」は文字として扱うという具合です。
他の固めのプログラム言語では比較的常識でもあるこの概念ですが、PHP では非常に弱いデータ型を持っているという特徴があり、データ型の情報はそれぞれ持っているものの、特定のデータ型専用の変数を作ることができず、汎用的にどのデータ型のデータでも変数に代入することができてしまう仕様となっています。
この仕様を補うためでもあるのでしょう、等号や不等号についても他言語と同様の「==」や「!=」はデータ型は無視し、内容が一致しているかまたは不一致であるかを返すという仕様になっています。
他の言語では当然のことができないのですが、緩いながらも存在するデータ型も含めて完全に一致しているかまたは不一致であるかを判定する比較演算子が「===」と「!==」になっているわけです。
速度だけであれば「===」と「!==」が早い結果となります。
$a == $bは型の相互変換をした後で $a が $b に等しい時に TRUE
$a === $bは$a が $b に等しく、および同じ型である場合に TRUE
基本的には厳密な比較演算子===を使えば自動キャストは行われないので、前情報通りこちらを使用した方が無難そうです。


◯fizzbizz
・ワンライナー
<?php foreach(range(1,100)as$i){echo($i%5&&$i%3?$i:'').($i%5?'':'fizz').($i%3?'':'buzz')."\n";}?>

・一般
<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i % 15 === 0) {
        echo 'fizzbuzz';
    } elseif ($i % 5 === 0) {
        echo 'buzz';
    } elseif ($i % 3 === 0) {
        echo 'fizz';
    } else {
        echo $i;
    }
}
?>


◯文字列・数値
printf(), sprintf()
文字列をフォーマットに当てはめて出力する。
printf() は出力を行い、sprintf() は結果を文字列として返す。

preg_match(), preg_match_all()
正規表現による一致・検索。preg_match_all() はパターンにマッチしたすべての値を変数に格納する。

preg_replace()
正規表現による置換。パターンにマッチした文字列を指定した文字列に置換する。

preg_quote()
正規表現構文の特殊文字の前にバックスラッシュをつけてエスケープする。

str_replace(), strtr()
文字列の置換。strtr() は複数の文字列のペアを渡して同時に置換できる。

substr(), mb_substr()
文字列の何文字目から何文字取り出すかを指定して文字列の一部分を返す。

strtolower(), strtoupper()
strtolower() はすべてのアルファベットを小文字に変換し、
strtoupper() はすべてのアルファベットを大文字に変換する。

strlen(), mb_strlen()
strlen() は文字列のバイト数を返す。
mb_strlen はマルチバイト文字の文字数を返す。

strpos(), mb_strpos()
文字列の中から指定された文字列が何文字目に存在するかを返す。
大文字小文字を区別しない場合、stripos()、mb_stripos() が用意されている。

mb_convert_encoding()
文字列を指定された文字コードに変換して返す。

mb_convert_kana()
ひらがな・カタカナ、全角・半角を相互に変換する。

trim(), ltrim(), rtrim()
文字列の前後からスペースやタブなどの空白文字や指定された文字を取り除く。
trim() は前後から取り除き、ltrim() は左から、rtrim() は右からのみ取り除く。

mt_rand()
指定された範囲でランダムな数値を返す。
rand() より精度が高い。

is_string()
与えられた値が文字列であるかを返す。

is_int()
与えられた値が整数型であるかを返す。

is_float()
与えられた値が float型(少数) であるかを返す。
is_double() も存在するが内容は is_float() の別名。

is_numeric()
与えられた値が数字として扱えるかを返す。文字列でも良い。

round(), floor(), ceil()
round() は小数部分を四捨五入して返す。
floor() は小数点以下切り捨て、ceil() は小数点以下切り上げで丸める。
桁数を指定することで小数点以下何桁から丸めるかを変更できる。


◯配列
array_slice()
配列の何番目からいくつ取り出すかを指定して取得する。

array_merge(), array_merge_recursive()
配列同士を結合する。array_merge_recursive() は再帰的に結合するため多次元配列でも使える。

in_array()
配列の中に指定された値が含まれているかを返す。

shuffle()
配列をランダムにシャッフルする。

sort(), rsort()
配列を昇順、降順でソート（並び替え）する。キーは新しく割り振られるため、もともとのキーは削除される。

asort(), arsort()
連想配列を昇順、降順でソート（並び替え）する。もともとのキーは保持される。

ksort(), krsort()
配列のキーをもとに昇順、降順でソートする。

usort(), uasort(), uksort()
ユーザーが定義した関数に基づいて配列をソートする。

array_multisort()
複数の配列を他の配列の値をもとにソートする。

array_unique()
配列から重複した値を削除して返す。

array_reverse()
配列の要素を逆順にして返す。

array_shift(), array_pop()
array_shift() は配列の先頭から要素を取り出し、
array_pop() は配列の末尾から要素を取り出す。
元の配列は取り出された分短くなる。

array_walk(), array_walk_recursive()
ユーザー定義関数を配列中のすべての値に適用する。
array_walk_recursive() は多次元配列に対して再帰的に処理する。

array_search()
配列の中から指定された値を持つ要素を検索し、見つかった場合そのキーを返す。

implode(), explode()
implode() は指定された区切り文字をもとに配列を文字列として結合し、
explode() は指定された区切り文字を元に文字列を配列に変換する。

range()
指定された範囲の整数・文字を持つ配列を作成する。

reset(), end()
reset() は配列のポインタを先頭の要素のセットし、その値を返す。
reset() は配列のポインタを最後の要素のセットし、その値を返す。
実際には配列の最初や最後の要素を取得する目的で使うことが多い。

next(), prev()
next() は配列のポインタを進め、その値を返す。
prev() は配列のポインタを戻し、その値を返す。

current()
現在の配列のポインタが指す値を返す。

extract()
連想配列のキー部分を変数名とする変数を作る。

list()
配列を引数として与えられた複数の変数に分けて代入する。

is_array()
渡された値が配列であるかを返す。

◯ファイル操作
file_get_contents()
ファイルの内容をすべて取得する。また、URLを指定してウェブサイトのソースを取得することもできる。

file_put_contents()
文字列をファイルとして保存する。モードを指定することで追記したり排他ロックが利用できる。

basename()
ファイルやディレクトリのパスから最後にある名前の部分を返す。

dirname()
ファイルパスからディレクトリパスを取り出して返す。
dirname(__FILE__) とすることで実行中のPHPファイルのあるディレクトリを得ることもできる。
これは「__DIR__」と同義。

realpath()
パスの「/./」や「/../」「/」などの参照を全て解決して正規化した絶対パスを返す。

file_exists()
指定されたファイルパスにファイルが存在するかを調べて返す。

fopen()
ファイルやURLをオープンしてストリームに結びつける。

flock()
fopen() によってオープンされたファイルのロック・開放を行う。

fgets()
ファイルポインタから一行取得する。

fgetcsv()
ファイルポインタから一行取得し、指定された文字をもとに区切られた配列を返す。

fwrite()
fopen() によってオープンされたファイルストリームに書き込む。

fclose()
fopen() によってオープンされたファイルポインタをクローズする。

rewind()
ファイルポインタの位置を先頭に戻す。

ftruncate()
fopen() によってオープンされたファイルの内容を指定した長さに丸める。
サイズに 0 を指定することでファイルを空にできる。

feof()
ファイルポインタが終端に達しているかを調べて返す。

is_uploaded_file()
ファイルが HTTP POST によりアップロードされたファイルであるかを調べて返す。
不正操作を防ぐために用いられる。

move_uploaded_file()
ファイルが HTTP POST によりアップロードされたファイルである場合、指定されたファイル名に移動する。

mkdir()
ディレクトリを作る。パーミッションを設定したり入れ子構造のディレクトリを作ることもできる。

unlink()
ファイルを削除する。

rmdir()
ディレクトリを削除する。

rename()
ファイル名を変える。ファイルを移動する。

copy()
ファイルをコピーする。

is_file()
指定されたパスがファイルを指しているかを調べて返す。

is_dir()
指定されたパスがディレクトリを指しているかを調べて返す。

chmod()
ファイルのパーミッションを変更する。

chown()
ファイルのオーナーを変更する。

◯その他
print_r()
変数の内容をわかりやすく表示する。
文字列に限らず連想配列も表示できるほか、第二引数に true を指定することで結果を文字列として返すこともできる。

var_dump()
変数の内容を詳細にダンプする。
含まれるオブジェクトの型、内容を細かく知ることができる。
print_r() よりも詳細な内容を知りたい時に使う。

count()
配列やオブジェクトの要素数を数えて返す。

isset()
変数が宣言されているか、配列にキーが存在するかを返す。
内容が NULL であっても TRUE を返す。配列にキーが存在するかを調べる関数として array_key_exists() があるが、そちらは ["key" => NULL] の場合 FALSE を返す。

empty()
変数の内容が空であるかを返す。空文字、「0」、空配列、NULL、FALSE などがからであると判断される。

unset()
指定した変数を破棄する。連想配列から一部のキーを取り除く際にも使える。

time(), microtime()
現在のUNIXタイムスタンプを得る。
1970年1月1日 00:00:00 GMT からの通算秒。
マイクロ秒まで知りたい場合は microtime() を使う。

mktime()
時、分、秒、月、日、年 を指定することでその日時のUNIXタイムスタンプを得る。

date()
UNIXタイムスタンプを日時を表す文字列としてフォーマットして出力する。
日時の取り扱いに関しては date() よりも DateTime クラスを利用するケースが増えている。

define()
定数を定義する。定数は書き換えられることのない変数のような値で、関数内などあらゆるスコープで利用できる。
大文字のアルファベットで名前をつける習慣がある。