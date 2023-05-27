{if $korisnici}
<div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="usernameButton" style="align-items:center"/>
              </form>
  </div>
  <div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Email:</label>
                <input type="text" id="username" name="email" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="emailButton" style="align-items:center"/>
              </form>
  </div>
<div style="display:flex; align-items:center; justify-content:center; gap:2rem; padding-bottom:2rem;">
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuAZ()">Username (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuZA()">Username (Z-A)</button>
</div>
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuBrojAZ()">Email (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuBrojZA()">Email (Z-A)</button>
</div>
</div>
<h1 style="display:flex; justify-content: center;">Popis moderatora</h1>
<div style="display:flex; justify-content: center;">
<table id="mojaTablica">
              <thead>
                <tr>
                <th>ID moderatora</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Broj prodanih proizvoda</th>
                </tr>
              </thead>
              <tbody>
  {foreach from=$korisnici item=redak}
      <tr>
      <td>{$redak.ID_korisnik}</td>
      <td>{$redak.username}</td>
      <td>{$redak.email}</td>
      <td>{$redak.broj_prodanih_proizvoda}</td>
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
<h1 style="display:flex; justify-content: center; font-size:large; font-weight:bolder; margin-top:10rem;">Nema zapisa u bazi podataka.</h1>
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

function sortirajTablicuBrojAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[2];
        y = redovi[i + 1].getElementsByTagName("TD")[2];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuBrojZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[2];
      y = redovi[i + 1].getElementsByTagName("TD")[2];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}
</script>