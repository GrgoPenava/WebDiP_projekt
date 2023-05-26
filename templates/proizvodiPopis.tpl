<div style="display:flex; justify-items:end; justify-content:end; margin-right: 2rem; margin-top:2rem; gap:1rem;">
<a href="{$putanja}/obrasci/kreirajProizvod.php" class="card-button">Kreiraj proizvod</a>
<a href="{$putanja}/ostalo/statistikaPoModeratoru.php" class="card-button">Statistika po moderatoru</a>
</div>
<div class="datumform" style="padding-bottom:0.5rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="moderator">Moderator:</label>
                <input type="text" id="moderator" name="moderator" ><br/>
              </div>
                <input id="moderatorButton" type="submit" value="Filtriraj" name="usernameButton" style="align-items:center"/>
              </form>
  </div>
  <div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="naziv">Naziv:</label>
                <input type="text" id="naziv" name="naziv" ><br/>
              </div>
                <input id="moderatorButton" type="submit" value="Filtriraj" name="nazivButton" style="align-items:center"/>
              </form>
  </div>
{if $proizvodi}
<div style="display:flex; align-items:center; justify-content:center; gap:2rem; padding-bottom:2rem;">
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuKolicinaAZ()">Količina (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuKolicinaZA()">Količina (Z-A)</button>
</div>
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuModeratorAZ()">Moderator (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuModeratorZA()">Moderator (Z-A)</button>
</div>
</div>
<div style="display:flex; justify-content: center;">
<table id="mojaTablica">
              <thead>
                <tr>
                <th></th>
                <th>ID</th>
                  <th>Naziv</th>
                  <th>Kolicina</th>
                  <th>Cijena</th>
                  <th>Cijena u bodovima</th>
                  <th>Bodovi za kupnju</th>
                  <th>Status</th>
                  <th>Moderator</th>
                </tr>
              </thead>
              <tbody>
  {foreach from=$proizvodi item=redak}
      <tr>
      <td id="urediProizvod"><a href="{$putanja}/obrasci/urediCijeliProizvod.php?proizvod={$redak.ID_proizvod}" class="card-button">Uredi</a></td>
      <td>{$redak.ID_proizvod}</td>
      <td>{$redak.naziv}</td>
      <td>{$redak.kolicina}</td>
      <td>{$redak.cijena}</td>
      <td>{$redak.cijena_u_bodovima}</td>
      <td>{$redak.bodovi_za_kupovinu}</td>
      <td>
      {if $redak.id_status_proizvoda == 1}
        Raspoloživo
      {elseif $redak.id_status_proizvoda == 2}
        Nije raspoloživo
      {else}
        Nepoznato
      {/if}
    </td>
      <td>{$redak.username}</td>
    </tr>
  {/foreach}
              </tbody>
              <tfoot>
              {if $brojacZapisa >0}
                <tr class="footertablice">
                  <td colspan="10">Ukupno zapisa: {$brojacZapisa}</td>
                </tr>
                {/if}
              </tfoot>
            </table>
</div>
{else}
<p style="display:flex; justify-content: center; font-size:large; font-weight:bolder;">Nema proizvoda u bazi podataka.</p>
{/if}
<div style="min-height:29rem; min-width:98vw;"></div>

<script type="text/javascript">
  function sortirajTablicuKolicinaAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[3];
        y = redovi[i + 1].getElementsByTagName("TD")[3];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuKolicinaZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[3];
      y = redovi[i + 1].getElementsByTagName("TD")[3];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}

function sortirajTablicuModeratorAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[8];
        y = redovi[i + 1].getElementsByTagName("TD")[8];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuModeratorZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[8];
      y = redovi[i + 1].getElementsByTagName("TD")[8];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}
</script>