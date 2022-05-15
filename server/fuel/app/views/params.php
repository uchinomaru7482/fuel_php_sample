<html>
  <head>
    <title>List of Parameters</title>
  </head>
  <body>
    <!-- セミコロンはendforeachを使用する際に必要 -->
    <?php foreach($params as $key=>$val):?>
      <p>
        parameter No. <?php echo $key;?>:
        <?php echo $val;?>
      </p>
    <?php endforeach;?>
  </body>
</html>
