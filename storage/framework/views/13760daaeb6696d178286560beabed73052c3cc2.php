

<?php $__env->startSection('title','ログイン画面'); ?>

<?php $__env->startSection('content'); ?>
      <form class="" action="after_login_top" method="post">
        <?php echo csrf_field(); ?>
        <table>
          <tr>
            <th>会員ID</th><td><input type="text" name="id" required></td>
          </tr>
          <tr>
            <th>Email</th><td><input type="text" name="id" required></td>
          </tr>
          <tr>
            <th></th><td><input type="submit" class="next_button" value="ログイン"></td>
          </tr>
        </table>
      </form>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\student\Desktop\webbookapp\resources\views/login.blade.php ENDPATH**/ ?>