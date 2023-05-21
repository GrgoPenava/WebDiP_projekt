<?php
/* Smarty version 4.3.0, created on 2023-05-07 19:27:10
  from 'C:\xampp\htdocs\moje_datoteke\templates\zaglavlje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6457df6e01df36_50236030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '021fc5bea0289fb2f54a9494f6474fd6950d8b68' => 
    array (
      0 => 'C:\\xampp\\htdocs\\moje_datoteke\\templates\\zaglavlje.tpl',
      1 => 1683480428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6457df6e01df36_50236030 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="autor stranice" content="Grgo Penava" />
  <meta name="opis s datumom kreiranja" content="Ovo je web stranica o automobilima marke BMW, kreirana u svrhu rješavanja prve vježbe iz programa Web dizajn i programiranje. Datum: 13.3.2023." />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="dvije ključne riječi" content="automobili, web" />
  <link rel="stylesheet" href="./css/gpenava.css" />
  <link rel="stylesheet" href="./css/gpenava_prilagodbe.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Početna stranica - BMW</title>
</head>

<body>
  <header>
    <div class="gornjiDioHeadera">
      <a href="./index.php">
        <img src="./multimedija/bmw-logo2.png" alt="BMW logo" class="bmw-logo" />
      </a>
      <a id="bmwTitle" href="./index.php">
        <h1>BMW</h1>
      </a>
      <form method="POST" id="jeziciForm">
        <select name="jezici" id="jezici" onchange="this.form.submit()">
          <option value="hrvatskiJezik" <?php echo '<?php'; ?>
 if (isset($_SESSION['odabrani_jezik']) && $_SESSION['odabrani_jezik'] == 'hrvatskiJezik') {
                                          echo 'selected';
                                        } <?php echo '?>'; ?>
Hrvatski jezik</option>
          <option value="engleskiJezik" <?php echo '<?php'; ?>
 if (isset($_SESSION['odabrani_jezik']) && $_SESSION['odabrani_jezik'] == 'engleskiJezik') {
                                          echo 'selected';
                                        } <?php echo '?>'; ?>
Engleski jezik</option>
          <option value="njemackiJezik" <?php echo '<?php'; ?>
 if (isset($_SESSION['odabrani_jezik']) && $_SESSION['odabrani_jezik'] == 'njemackiJezik') {
                                          echo 'selected';
                                        } <?php echo '?>'; ?>
Njemački jezik</option>
        </select>
      </form>
      <a href="#pretrazivanje"><i class="fa fa-search" id="searchIcon"></i></a>
      <div id="pretrazivanje">
        <div class="popup-content">
          <a href="#"><i class="fa fa-close" id="exitIcon"></i></a>
          <form id="form1" method="post" name="form1" action="http://barka.foi.hr/WebDiP/2022/materijali/zadace/ispis_forme.php" novalidate>
            <label for="trazi">Pojam:</label>
            <input type="search" id="trazi" name="trazi" />
            <input type="submit" value="Pretraži" />
          </form>
        </div>
      </div>
    </div>
    <?php echo '<?php'; ?>





    echo "<nav>
            <a href=\"./index.php\" id='bmw'>Početna stranica</a>
            <a href=\"./o_autoru.php\">O autoru</a> 
            <a href=\"./obrasci/autentikacija.php\">Autentikacija</a>
         ";
    if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] < 4) {
      echo "<a href=\"./obrasci/obrazac.php\">Obrazac</a>";
      echo "<a href=\"./ostalo/popis.php\">Popis</a>";
    }
    if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] <= 2) {
      echo "<a href=\"./ostalo/multimedija.php\">Multimedija</a>";
    }
    if (isset($_SESSION["uloga"])) {
      echo "<button type='button' class='odjava-button'><a href='?odjava=da'>Odjava</a></button>";
    }
    echo "</nav>";


    <?php echo '?>'; ?>

  </header><?php }
}
