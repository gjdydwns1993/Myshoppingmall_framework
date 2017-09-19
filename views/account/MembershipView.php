<h2>회원가입</h2>
<form name="member_form" method="post" action="<?php print $base_url?>/account/register">
 <input type="hidden" name="mode" value="membership">
 <input type="hidden" name="_token" value="<?php print $this->escape($_token);?>">
  <table border="1" >
    <tr>
      <td align="right">*아이디 : </td>
      <td><input type="text" name="id"  value=""></td>
    </tr>
    <tr>
      <td align="right">* 비밀번호 : </td>
      <td><input type="password" name="passwd"  value=""></td>
    </tr>
    <tr>
      <td align="right">* 이름 : </td>
      <td><input type="text" name="name"  value=""></td>
    </tr>
    <tr>
      <td align="right">* 비밀번호 확인 : </td>
      <td><input type="password" name="passwd_confirm"></td>
    </tr>
    <tr>
      <td align="right">* 닉네임 : </td>
      <td><input type="text" name="nick"></td>
    </tr>
    <tr>
      <td align="right">성별 : </td>
      <td>
        <input type="radio" name="sex" value="M" checked>남
        <input type="radio" name="sex" value="F" checked>여
      </td>
    </tr>
    <tr>
      <td align="right">휴대전화 : </td>
      <td>
        <select name='phone1'>
          <option>선택</option>
          <option value="010">010</option>
        </select>
        -<input type="text" size="4" name="phone2" maxlength="4">
        -<input type="text" size="4" name="phone3" maxlength="4">
      </td>
    </tr>
    <tr>
      <td align="right">주소 : </td>
      <td><input type="text" size="50" name="address"></td>
    </tr>
  </table>
</form>
<br>
<table border="0" width="640">
  <tr>
    <td align="center">
      <button onclick="check_input()">가입</button>
      <input type="reset" value="초기화">
    </td>
  </tr>
</table>
</section>
<script src='/js/membershipCheck.js'></script>
