# 独学

## ◯FizzBuzz問題  

### for文  
for i in 1..30  

    if i%15==0  
        puts "FizzBuzz!"  
    elsif i%3==0  
        puts "Fizz!"  
    elsif i%5==0   
        puts "Buzz!"  
    else  
        puts i  
    end  
end  

### uptoメソッド  
1.upto(30) do |i|  

    if i%15==0  
        puts "FizzBuzz!"  
    elsif i%3==0  
        puts "Fizz!"  
    elsif i%5==0  
        puts "Buzz!"  
    else  
        puts i  
    end  
end

### eachメソッド  
(1..30).each do |i|

    if i%15==0
        puts "FizzBuzz!"
    elsif i%3==0
        puts "Fizz!"
    elsif i%5==0 
        puts "Buzz!"
    else
        puts i
    end

end

### timesメソッド  
1..30.times do |i|    

    if i%15==0
        puts "FizzBuzz!"
    elsif i%3==0
        puts "Fizz!"
    elsif i%5==0 
        puts "Buzz!"
    else
        puts i
    end

end


<br />

## ワンライナー　fizzbuzz
### Ruby
1.upto(100){|i|puts i%15==0?'fizzbuzz':i%5==0?'buzz':i%3==0?'fizz':i}

### JavaScript
for(var i=1;i<101;i++) console.log((i%3?'':'fizz')+(i%5?'':'buzz')||i);


## RDS
RDSはAmazon Relational Database Serviceの略  
マネージド型だから、データベース運用における面倒な部分を色々AWS側が面倒見てくれるサービス。  
オペレーティングシステムやデータベースエンジンの管理はAWS側で行われ、利用者は数分でデータベースを起動してアクセスできる。  
Amazon EC2（EC2）同様、従量課金となっていて、RDSインスタンスが起動している時間に対して利用料が発生する。  
現時点でRDSでは次の6つのデータベースエンジンをサポートしている。  
MySQL  
MariaDB  
Oracle  
SQL Server  
PostgreSQL  
Amazon Aurora  

メリット  
1.高速なパフォーマンス  
2.強靭な高可用性  
3.安全なセキュリティ  
4.耐障害性（フォールトトレランス）  


### MultiAZ構成（マルチアベイラビリティゾーン構造）
MultiAZ構成とは、複数のデータセンターであるAZ（Availability Zone）を対してRDSが配置される構造のこと

起動時に用意されているMultiAZオプションをオンにすると、自動的に2つのRDSを２つのAZに渡って構築してくれる。
これらのRDSは、マスター（プライマリ）とスレーブ（セカンダリ）という関係性があり、マスターへの変更が自動的にスレーブに反映される仕組みとなっている。

この仕組みをレプリケーションと呼び、その中でもこれはマスターへの変更後にスレーブを変更が完了してから応答するので同期レプリケーションという。
同期レプリケーションは、スレーブへのデータの反映を待つ時間だけ数ms遅延が生じるが、データベース障害の影響を最小限に抑えることができる。



<br />
<br />

## ◯Docker  

### リストアまでの流れ (docker.rails.postgresql)
・docker cp ファイル名 コンテナ名orコンテナID:/ファイルの階層  
コピー  
・docker-compose exec db bash  
dbにログイン  
・pg_restore -d データベース名 -U postgres /ファイルの階層  
リストア  
・docker-compose run web bundle exec rake db:migrate RAILS_ENV=development  
環境指定  

### データベースにログイン (docker.postgresql)  
・docker-compose exec db bash  
データベースにログイン  
・su postgres  
ユーザー権限を切り替える  
・psql データベース名  
データベースを指定して接続  

### ウェブにログイン (docker.rails.postgresql)  
・docker-compose exec web bash  
webにログイン。

### 無駄なボリュームを削除  
・docker system prune  
イメージ、コンテナ、ネットワークを削除  
(Docker 17.06.1 以上でボリュームも削除したい場合は、docker system prune --volumes)  
・docker volume rm 'docker volume ls -qf danging=true'  
コンテナから参照されていない(不要な)ボリュームを列挙して(docker volume ls ...)、それをdocker volume rmで削除している。  



<br />
<br />

## 問題
### ◯取得した数字N。N週間後は何日後か。  
input_line = gets.to_i  
puts input_line * 7

### ◯N人で試合をした時の試合数。N ✖︎ (N - 1) / 2で出る。  
N = gets.to_i  
puts N * (N - 1) / 2

### ◯
b  
n  
a_1  
a_2  
:  
a_n  
ここで、b は当選番号、n は購入した宝くじの数、a_1,…,a_n は購入した宝くじ券の番号をそれぞれ表します。  
1等の場合: first  
前後賞の場合: adjacent  
2等の場合: second  
3等の場合: third  
それ以外（外れ）の場合: blank  

b = gets.to_i  
n = gets.to_i  
a = n.times.map { gets.to_i }  

a.each do |e|  
  result = 'blank'  

  if e == b  
    result = 'first'  
  elsif e + 1 == b || e - 1 == b  
    result = 'adjacent'  
  elsif e % 10_000 == b % 10_000  
    result = 'second'  
  elsif e % 1000 == b % 1000  
    result = 'third'  
  end  

  puts result  
end  

### ◯N分は何秒か  
input_line = gets.to_i  
puts input_line * 60  


### ◯Nキロあたり1500グラムのプロテインを飲む  
input_line = gets.to_i  
puts input_line * 1500  

### ◯aメートルの校庭をb週した時の距離  
a= gets.to_i  
b= gets.to_i  
puts a * b  

### ◯printメソッド意味  
printメソッドは以下のサンプルコードのように、半角スペースを空けて出力する値を指定するだけで利用できます。  
printメソッドの特徴は改行を入れずに引数に指定した値を出力することです。  

print 'こんにちは'  
print '今日の天気は'  
print '晴れですね'  
[実行結果]  
こんにちは今日の天気は晴れですね  


### ◯長さ n の 2 つの数列 A = {a_1, a_2, ..., a_n}, B = {b_1, b_2, ..., b_n} が与えられます。  
数列の差 C = {b_1-a_1, b_2-a_2, ..., b_n-a_n} を求めてください。  

n = gets.to_i  
a = gets.split.map(&:to_i)  
b = gets.split.map(&:to_i)  

n.times do |i|  
  ans = b[i] - a[i]  
  print ans  
  if i < n - 1  
    print ' '  
  else  
    puts  
  end  
end  

gets.splitは、標準入力から1行とって空白で区切って配列にします。最終的にto_iで整数化するためchompでの改行削除は省略します。  
ここまでで標準入力が’1 2 3\n’だとしたら、データは[‘1’, ‘2’, ‘3\n’]という文字列の配列になっています。  
mapは、結果を配列にして返すメソッドです。これによって各要素にto_iを行い整数の配列とするのが今回のコードの目的です。  

### ### ◯取得した数字が偶数か奇数か  
input_line = gets.to_i  
if input_line / 2  
  puts "even"  
else  
  puts "odd"  
end  

### ◯サイコロの裏の数字  
input_line = gets.to_i  
puts 7 - input_line  

◯最初に与えられる数字が走った距離、次に与えられる数字が使ったリットル。1リットルあたり何キロ走ったのか。  
a = gets.to_i  
b = gets.to_i  
puts a / b  

◯閏年  
coding: utf-8  
 入力される行数の取得  
line_size = gets.to_i  
line_size.times do  
  year = gets.to_i  
   うるう年判定  
  if (year % 4 == 0 and year % 100 != 0) or year % 400 == 0  
    print year," is a leap year\n"  
  else  
    print year," is not a leap year\n"  
  end  
end  

<br />


## メソッド  
### ◯eachメソッド  
（1..10） each do |i|  
上記のように範囲を直接使う場合は（）が必要  

a = 1..10  
a each do |i|  
上記のように変数に当てはめて使う場合は（）がいらない  

### ◯for文  
for i in 1..10の様に書く。iがendまで使える。  

### ◯upto  
オブジェクト.upto(max) do |変数|  
  実行する処理1  
  実行する処理2  
end  
uptoメソッドは、変数に「対象のオブジェクトが持つ数値」から「max」を順に代入しながら「do」から「end」までの処理を実行する。1回繰り返す毎に1ずつ数値は増加。  

具体的には  
1.upto(10) do |i|  
  実行する処理1  
  実行する処理2  
end  

### ◯times  
1..10.times do |i|  
  実行する処理1  
  実行する処理2  
end  

### ◯while  
while文は条件がtrueの間、処理を繰り返す。  

i = 1  
while i <= 5  
  puts i  
  i += 1  
end  

変数iに1を代入し、変数iが5以下の間、iの値を出力したあと+1して再び条件式の評価へ戻るループ処理を行う。  
実行すると画面には1から5までの数字が表示される。  













