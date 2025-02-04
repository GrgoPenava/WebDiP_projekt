<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="autor stranice" content="Grgo Penava" />
    <meta name="opis s datumom kreiranja" content="Ovo je web stranica o automobilima marke BMW, kreirana u svrhu rješavanja prve vježbe iz programa Web dizajn i programiranje. Datum: 13.3.2023." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="dvije ključne riječi" content="automobili, web" />
    <link rel="stylesheet" href="{$putanja}/css/gpenava.css" />
    <link rel="stylesheet" href="{$putanja}/css/gpenava_prilagodbe.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>{$naslov}</title>
</head>

<body>
    <header>
        <div class="gornjiDioHeadera">
            <a href="{$putanja}/index.php">
                <img src="{$putanja}/multimedija/shop-logo.png" alt="Shop logo" class="bmw-logo" />
            </a>
            <a id="bmwTitle" href="{$putanja}/index.php">
                <h1>SHOP</h1>
            </a>
            <form action="" method="POST" id="jeziciForm">
                <select name="jezici" id="jezici" onchange="this.form.submit()">
                    <option value="hrvatskiJezik" {$jezik_oznacen_hrvatski}>Hrvatski jezik</option>
                    <option value="engleskiJezik" {$jezik_oznacen_engleski}>Engleski jezik</option>
                    <option value="njemackiJezik" {$jezik_oznacen_njemacki}>Njemački jezik</option>
                </select>
            </form>
        </div>
    </header>