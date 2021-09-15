<?php

// 問題を定義
$question = array(
    "question" => "コーヒーの起源は？",
    "choices"  => array("アビシニア", "ハラール",  "南スーダン", "イルガチェフ", "シダモ", "ゲシャ"),
    "answer"   => "南スーダン",
);

// 出題をシャッフル
shuffle($question['choices']);

//　回答があった時
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["answer"])) {
    // 答え合わせ
    $result = "不正解";
    if ($_POST['answer'] == $question['answer']) {
        $result = "正解";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コーヒークイズ</title>
</head>
<body>
<form action="" method="post">
<p>問題: <?php echo $question['question']; ?></p>
    <ul>
    <?php foreach ($question['choices'] as $choises) : ?>
        <li><input type="radio" name="answer" value="<?php echo $choises; ?>"><?php echo $choises; ?></li>
        <?php endforeach; ?>
    </ul>
    <input type="submit" value="回答">
</form>
<?php if(isset($result)) : ?>
    <p><?php echo $result ?></p>
    <?php endif; ?>


</body>
</html