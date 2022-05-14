<html>
  <meta charset="UTF-8">
  <body>
    <?php foreach ($rows as $row): ?>
      <div style="background-color: #999">
        <?php echo $row['title']; ?>
      </div>
      <div>
        <?php echo $row['summary']; ?>
      </div>
      <div>
        <!-- nl2br テキスト表示の際に改行をbrタグに変換する関数 -->
        <?php echo nl2br($row['body']); ?>
      </div>
    <?php endforeach; ?>
  </body>
</html>
