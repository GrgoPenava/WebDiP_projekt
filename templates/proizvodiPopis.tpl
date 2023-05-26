<div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><br/>
              </div>
                <input id="usernameButton" type="submit" value="Filtriraj" name="usernameButton" style="align-items:center"/>
              </form>
  </div>
{if $proizvodi}
<div style="display:flex; align-items:center; justify-content:center; gap:0.2rem; padding-bottom:2rem;">
<button id="usernameButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuAZ()">A-Z</button>
<button id="usernameButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuZA()">Z-A</button>
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
      <td>{$redak.id_status_proizvoda}</td>
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
<p style="display:flex; justify-content: center; font-size:large; font-weight:bolder;">Nema korisnika u bazi podataka.</p>
{/if}
<div style="min-height:29rem; min-width:98vw;"></div>

<script type="text/javascript">
  function sortirajTablicuAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[1];
        y = redovi[i + 1].getElementsByTagName("TD")[1];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[1];
      y = redovi[i + 1].getElementsByTagName("TD")[1];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}
</script>