<?php echo Form::open(); ?>
<fieldset>
  <!-- isset()は変数が宣言されていてnullでない場合にtrueとなる -->
  <?php if (isset($error)): ?>
    <div class="clearfix" style="color:red">
      ユーザ名又はパスワードが間違っています。
    </div>
  <?php endif; ?>
  <div class="clearfix">
    <?php echo Form::label('ユーザ名', 'username'); ?>
    <?php echo Form::input('username'); ?>
  </div>
  <div class="clearfix">
    <?php echo Form::label('パスワード', 'password'); ?>
    <?php echo Form::password('password'); ?>
  </div>
  <div class="actions">
    <?php echo Form::submit('submit', 'ログイン'); ?>
  </div>
</fieldset>
<?php echo Form::close(); ?>
