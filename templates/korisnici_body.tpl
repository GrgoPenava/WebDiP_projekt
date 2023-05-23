<div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><br/>
              </div>
                <input id="usernameButton" type="submit" value="Filtriraj" name="usernameButton" style="align-items:center"/>
              </form>
              <div style="display:flex; gap:0.2rem;">
              <form id="azForm" method="POST" name="form4" novalidate>
                <input id="usernameButton" type="submit" value="A-Z" name="azbutton" style="align-items:center"/>
              </form>
              <form id="zaForm" method="POST" name="form5" novalidate>
                <input id="usernameButton" type="submit" value="Z-A" name="zabutton" style="align-items:center"/>
              </form>
              </div>
  </div>
{if $korisnici}
<div style="display:flex; justify-content: center;">
<table>
              <thead>
                <tr>
                <th>Email</th>
                  <th>Username</th>
                  <th>Ime</th>
                  <th>Prezime</th>
                </tr>
              </thead>
              <tbody>
  {foreach from=$korisnici item=redak}
      <tr>
      <td>{$redak.email}</td>
      <td>{$redak.username}</td>
      <td>{$redak.ime}</td>
      <td>{$redak.prezime}</td>
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
</script>