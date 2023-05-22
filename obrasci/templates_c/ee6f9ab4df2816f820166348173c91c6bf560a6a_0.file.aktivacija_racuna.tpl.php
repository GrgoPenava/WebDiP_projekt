<?php
/* Smarty version 4.3.0, created on 2023-05-22 18:52:55
  from 'C:\xampp\htdocs\projekt\templates\aktivacija_racuna.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646b9de7c1f1f3_67556614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee6f9ab4df2816f820166348173c91c6bf560a6a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\aktivacija_racuna.tpl',
      1 => 1684774216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646b9de7c1f1f3_67556614 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>

<h1 class="naslov-o-autoru">Aktivacija računa</h1>
<main>
      <div style="min-height:30rem;">
      <div style="border: 2px solid #000; padding:2rem;">
      <form id="form3" method="POST" name="form3" novalidate>
                <label for="email">Email adresa: </label>
                <input type="email" id="email" name="email" size="50" placeholder="naziv@nazivposluzitelja.xxx" required="required"><br />
                <label for="aktivacijski kod">Aktivacijski kod: </label>
                <input type="text" id="aktivacijskikod" name="aktivacijskiKod" size="50" placeholder="aktivacijski kod" required="required" /><br />
                <input id="submit2" type="submit" value="Aktiviraj " name="aktivirajButton" style="display: flex; flex-direction: column; justify-items: center;"/>
                <?php if ((isset($_smarty_tpl->tpl_vars['poruka']->value))) {?> 
                  <p style='color: red'><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
                <?php }?>
              </form>
      </div>
    </div>
    </main><?php }
}
