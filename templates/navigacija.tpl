<div class="izbornik"><nav>
        <a href="{$putanja}/index.php">Kampanje</a>
        <a href="{$putanja}/ostalo/korisnici.php">Korisnici</a>
        <a href="{$putanja}/obrasci/autentikacija.php">Autentikacija</a>
        {if isset($smarty.session.uloga)&& $smarty.session.uloga < 4}
        {/if}
        {if isset($smarty.session.uloga)&& $smarty.session.uloga < 3}
        {/if}

        {if isset($smarty.session.uloga)&& $smarty.session.uloga == 1}
        <a href="{$putanja}/ostalo/proizvodiPopis.php">Proizvodi</a>
        {/if}
        {if isset($smarty.session.uloga)&& $smarty.session.uloga < 4}
            <a href="{$putanja}/ostalo/profil.php">Profil</a>
        {/if}
        {if isset($smarty.session.uloga)}
            <a href='?odjava=da'><button type='button' class='odjava-button'>Odjava</button></a>
        {/if}
        </nav>
        </div>