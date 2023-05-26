<main>
    <section class="centeredsection" style="height: 50rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Uređivanje uloge korisnika</p>
        {if isset($porukaGreske)}
        <p class="dodavanjenoveporuke" style="color:red;">{$porukaGreske}</p>
        {/if}
        {if isset($porukaUspjeha)}
        <p class="dodavanjenoveporuke" style="color:green;">{$porukaUspjeha}</p>
        {/if}
        <form id="kreirajKampanju" method="post" name="urediProizvod" action="" novalidate>
          <fieldset>
            <legend>Korisnik:</legend>
            <label for="bodovizakupovinu">Ime i prezime: </label>
            <input disabled type="text" id="bodovizakupovinu" name="bodovi_za_kupovinu" placeholder="5" required="required" {if isset($korisnikZaUrediti["ime"]) && isset($korisnikZaUrediti["prezime"])} value="{$korisnikZaUrediti["ime"]} {$korisnikZaUrediti["prezime"]}"{/if} /><br />
            <label for="status_proizvoda">Uloga korisnika:</label>
            <select id="status_proizvoda" name="uloga" style="width:14rem;">
            {foreach $sveUloge as $uloga}
                <option value="{$uloga['ID_uloga']}" {if isset($korisnikZaUrediti["ID_uloga"]) && $uloga['ID_uloga'] == $korisnikZaUrediti["ID_uloga"]} selected{/if}>{$uloga['naziv_uloga']}</option>
            {/foreach}
            </select>
            <br/>
            <input type="hidden" name="ID_korisnik" value="{$korisnikZaUrediti["ID_korisnik"]}">
            <div style="display:flex; justify-items:center;">
            <input id="submit" name="urediUloguKorisnika" type="submit" value="Uredi" style="cursor:pointer;"  />
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </main>
