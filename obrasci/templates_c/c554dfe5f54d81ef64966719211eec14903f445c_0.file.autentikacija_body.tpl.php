<?php
/* Smarty version 4.3.0, created on 2023-05-09 23:25:13
  from 'C:\xampp\htdocs\moje_datoteke\templates\autentikacija_body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
  'version' => '4.3.0',
  'unifunc' => 'content_645aba3996c793_62212638',
  'has_nocache_code' => false,
  'file_dependency' =>
  array(
    'c554dfe5f54d81ef64966719211eec14903f445c' =>
    array(
      0 => 'C:\\xampp\\htdocs\\moje_datoteke\\templates\\autentikacija_body.tpl',
      1 => 1683667512,
      2 => 'file',
    ),
  ),
  'includes' =>
  array(),
), false)) {
  function content_645aba3996c793_62212638(Smarty_Internal_Template $_smarty_tpl)
  {
    echo '<script'; ?>
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
    >
    <?php echo '<script'; ?>
    src="//code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
    >
    <?php echo '<script'; ?>
    src="//code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
    >
    <main>
      <div class="autentikacijaclass" style="height: 25rem;">
        <section class="autentikacija" style="margin-top: 4rem;">
          <div class="registracijaiprijava">
            <div class="registracija">
              <form id="form2" method="post" name="form2" action="" novalidate>
                <label for="imeprezime" <?php echo $_smarty_tpl->tpl_vars['imeprezimeboja']->value; ?>>Ime i prezime: </label>
                <input type="text" id="imeprezime" name="imeprezime" maxlength="30" placeholder="Ime i prezime" required="required" />
                <br />
                <?php if ((isset($_smarty_tpl->tpl_vars['imeprezimeprovjera']->value)) && strlen($_smarty_tpl->tpl_vars['imeprezimeprovjera']->value) > 2) { ?>
                  <label style="color:red; font-size:15px;"><?php echo $_smarty_tpl->tpl_vars['imeprezimeprovjera']->value; ?>
                    <label>
                      <br />
                    <?php } ?>
                    <label for="email" <?php echo $_smarty_tpl->tpl_vars['emailboja']->value; ?>>Email adresa: </label>
                    <input type="email" id="email" name="email" size="30" maxlength="50" placeholder="naziv@nazivposluzitelja.xxx" required="required" onblur="checkEmail()" /><br />
                    <?php if ((isset($_smarty_tpl->tpl_vars['emailprovjera']->value)) && strlen($_smarty_tpl->tpl_vars['emailprovjera']->value) > 2) { ?>
                      <label style="color:red; font-size:15px;"><?php echo $_smarty_tpl->tpl_vars['emailprovjera']->value; ?>
                        <label>
                          <br />
                        <?php } ?>
                        <label for="spol" style="color:black;">Spol: </label>
                        <select name="spol" id="spol">
                          <option value="musko">Muško</option>
                          <option value="zensko">Žensko</option>
                        </select>
                        <br />
                        <label for="lozinka" <?php echo $_smarty_tpl->tpl_vars['lozinkaboja']->value; ?>>Lozinka: </label>
                        <input type="password" id="lozinka" name="lozinka" pattern=".<?php echo 5; ?>
" placeholder="lozinka" required="required" /><br />
                        <?php if ((isset($_smarty_tpl->tpl_vars['lozinkaprovjera']->value)) && strlen($_smarty_tpl->tpl_vars['lozinkaprovjera']->value) > 2) { ?>
                          <label style="color:red; font-size:15px;"><?php echo $_smarty_tpl->tpl_vars['lozinkaprovjera']->value; ?>
                            <label>
                              <br />
                            <?php } ?>
                            <label for="potvrdalozinke" <?php echo $_smarty_tpl->tpl_vars['potvrdiboja']->value; ?>>Potvrdi lozinku: </label>
                            <input type="password" id="potvrdalozinke" name="potvrdalozinke" pattern=".<?php echo 5; ?>
" placeholder="potvrdi lozinku" required="required" /><br />
                            <?php if ((isset($_smarty_tpl->tpl_vars['potvrdaprovjera']->value)) && strlen($_smarty_tpl->tpl_vars['potvrdaprovjera']->value) > 2) { ?>
                              <label style="color:red; font-size:15px;"><?php echo $_smarty_tpl->tpl_vars['potvrdaprovjera']->value; ?>
                                <label>
                                  <br />
                                <?php } ?>
                                <input id="submit" type="submit" value="Registriraj se " name="registracijaButton" />
                                <?php if ((isset($_smarty_tpl->tpl_vars['poruka_registracija']->value))) { ?>
                                  <p style='color: red; text-align: center;'><?php echo $_smarty_tpl->tpl_vars['poruka_registracija']->value; ?>
                                  </p>
                                <?php } ?>
              </form>
            </div>
            <div class="prijava">
              <form id="form3" method="POST" name="form3" novalidate>
                <label for="email">Email adresa: </label>
                <input type="email" id="email2" name="email" size="30" placeholder="naziv@nazivposluzitelja.xxx" required="required" "/><br />
                <label for=" lozinka">Lozinka: </label>
                <input type="password" id="lozinka2" name="lozinka" size="30" placeholder="lozinka" required="required" /><br />
                <input id="submit2" type="submit" value="Prijavi se " name="prijavaButton" />
                <?php if ((isset($_smarty_tpl->tpl_vars['poruka']->value))) { ?>
                  <p style='color: red'><?php echo $_smarty_tpl->tpl_vars['poruka']->value; ?>
                  </p>
                <?php } ?>
                <p style="font-size: small;">Administrator = gpenava@student.foi.hr - grgopenava</p>
                <p style="font-size: small;">Moderator = markomarkovic@gmail.com - markomarkovic</p>
                <p style="font-size: small;">Korisnik = anaanic@gmail.com - anaanic0</p>
              </form>
            </div>
          </div>
        </section>
      </div>
    </main>

    <?php echo '<script'; ?>
    type="text/javascript">
    function checkEmail() {
    let email = document.getElementById('email').value;
    $.ajax({
    url: '../privatno/email_provjera.php',
    type: 'POST',
    dataType: 'json',
    data: { email: email },
    success:function(result){
    console.log(result.pronaden_email);
    if(result.pronaden_email === true){
    alert("Email adresa je već zauzeta");
    document.getElementById('email').value = null;
    }
    }
    });
    }
    <?php echo '</script'; ?>
    ><?php }
  }
