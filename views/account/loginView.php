<script>alert("<?=$errors?>")</script>
<fieldset id='fieldset'>
  <legend>로그인</legend>
    <form action="<?php print $base_url?>/account/login" method="POST">
      <input type="hidden" name="mode" value="login">
      <input type="hidden" name="_token" value="<?php print $this->escape($_token);?>">
      <table>
          <tr>
            <td>아이디</td>
            <td><input type="text" name='id'></td>
            <td rowspan="2">
              <input type="submit" value="로그인" >
            </td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td><input type="password" name="passwd"></td>
          </tr>
      </table>
    </form>
</fieldset>
