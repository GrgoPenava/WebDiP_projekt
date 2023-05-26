<?php
/* Smarty version 4.3.0, created on 2023-05-26 14:01:42
  from 'C:\xampp\htdocs\projekt\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64709fa6373487_69985165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f43a3789c82d11bd9164a4561e8dc794e6326bf7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\header.tpl',
      1 => 1685102380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64709fa6373487_69985165 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="autor stranice" content="Grgo Penava" />
    <meta name="opis s datumom kreiranja" content="Ovo je web stranica o automobilima marke BMW, kreirana u svrhu rješavanja prve vježbe iz programa Web dizajn i programiranje. Datum: 13.3.2023." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="dvije ključne riječi" content="automobili, web" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/gpenava.css" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/gpenava_prilagodbe.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</title>
</head>

<body>
    <header>
        <div class="gornjiDioHeadera">
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">
                <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/shop-logo.png" alt="Shop logo" class="bmw-logo" />
            </a>
            <a id="bmwTitle" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">
                <h1>SHOP</h1>
            </a>
            <form action="" method="POST" id="jeziciForm">
                <select name="jezici" id="jezici" onchange="this.form.submit()">
                    <option value="hrvatskiJezik" <?php echo $_smarty_tpl->tpl_vars['jezik_oznacen_hrvatski']->value;?>
>Hrvatski jezik</option>
                    <option value="engleskiJezik" <?php echo $_smarty_tpl->tpl_vars['jezik_oznacen_engleski']->value;?>
>Engleski jezik</option>
                    <option value="njemackiJezik" <?php echo $_smarty_tpl->tpl_vars['jezik_oznacen_njemacki']->value;?>
>Njemački jezik</option>
                </select>
            </form>
        </div>
    </header><?php }
}
